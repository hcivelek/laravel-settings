<?php

namespace hcivelek\Settings\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait hasSettings
{
    public function settings(): MorphMany
    {
      /*
        \App::singleton(config('settings.singleton'), function(){
          return Setting::all()->pluck("value","keyword")->toArray();
        });   
*/
        return $this->morphMany(
            \hcivelek\Settings\Entities\Setting::class,
            'model'
        );
    }

    /**
     * Add a setting by keyword and value 
     *  */     
    public function addSetting($keyword, $value)
    {
        try {
            $this->settings()->create([
                "keyword" => $keyword,
                "value" => $value,
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

          $errorCode = $e->errorInfo[1];
          if($errorCode == '1062'){
            $this->settings()->where("keyword",$keyword)->update([
              "value" => $value,
            ]);  
          }

        }
    }

    public function addSettings($settings){
      if(!is_array($settings))
        return;

      foreach($settings as $keyword=>$value){
        $this->addSetting($keyword, $value);
      }
    }

    public function removeSetting($keyword){
      $this->settings()->where('keyword', $keyword)->delete();

      $this->load('settings');
    }

    public function removeSettings($keywords){
      if(!is_array($keywords))
        return $this->removeSetting($keywords);
      
      $this->settings()->whereIn('keyword', $keywords)->delete();


      $this->load('settings');
    }    

    /**
     *  Delete all existing settings for model and add new ones.
     */
    
    public function syncSettings($settings){
      if(!is_array($settings))
        return;

      $this->settings()->delete();
      $this->addSettings($settings);

      $this->load('settings');
    }

    public function valueOfSetting($keyword){
      //loads all settings first and then use same collection every time.
      $result =  $this->settings->firstWhere('keyword', $keyword);
      
      if($result)
        return $result->value;

      return null;
      
    }

}
