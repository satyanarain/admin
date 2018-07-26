<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Distribution extends Model
{
  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'distributions';
   // protected $guarded = [];
    public $fillable = ['id', 'taxon_id', 'selectioncriteria', 'specie_id', 'specie_data', 'method_id', 'observation_id', 'gazetteer_id', 'day', 'month', 'year', 'number', 'observer_id', 'age_id', 'abundance_id', 'specimendata', 'specimencode', 'collectorinstitution', 'Sex', 'remark', 'status', 'habitat', 'created_at', 'updated_at', 'created_by'];
    
    
//        public function bustypes()
//    {
//       
//        return $this->belongsTo('App\Models\BusType', 'bus_type_id');
//    }
//    public function bustypes(){
//         return $this->belongsTo('BusYype');
//    }
  
    
    
//     public function busTypes()
//    {
//        return $this->hasOne('App\Models\BusType')->orderBy('id','desc');
//    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}
