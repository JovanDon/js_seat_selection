<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Bookings; 
use App\User;
use App\Towns;
use App\Routes;
use App\Schedules;
  

class Bus_tickecking_DB_seeder extends Seeder
{
   
    
    public function run()
    {
        $faker = Faker\Factory::create();
       
    //administrations
    $this->create_towns($faker);
    $this->create_routes($faker);
    $this->create_schedules($faker);
        

    //customers/clients
    $this->generateUser_and_book($faker);                      
     
    }


    private function create_towns($faker){
        $towns_array=[ 'Adjumani', 'Amuria', 'Arua', 'Budaka', 'Bududa', 'Bugiri', 
                        'Bukedea', 'Bushenyi', 'Busia', 'Dokolo', 'Hoima', 'Ibanda', 
                        'Iganga', 'Jinja', 'Kabale', 'Kaliro', 'Bukomansimbi', 'Masaka', 
                        'Namutumba', 'Mbale', 'Mubende', 'Mityana', 'Mayuge', 'Masindi',
                        'Ntungamo', 'Sheema', 'Tororo', 'Soroti', 'Rakai', 'Pallisa', 'Nakasongola'
                    ];
        for ($i=0; $i < 30; $i++) {
            $this->submit_a_town($towns_array[$i ],$faker);
        }
  
    }
    private function create_routes($faker){
        $towns = DB::table('towns')
        ->whereNotIn('name', ['kampala','Mbarara','Gulu'])
        ->get();
        $town_ids=$towns->pluck('id')->toArray();
        for ($i=0; $i < 30; $i++) {
            $this->submit_a_route(2,$town_ids[$i],$faker);
            $this->submit_a_route($town_ids[$i],2,$faker);//corrrsponding return route
        }
        
    }
    
    private function create_schedules($faker){
        $route_ids =Routes::all()->where('id','>',4)->pluck('id')->toArray();

        for ($i=0; $i < 60; $i++) {

            for ($j=0; $j < 7; $j++) {
                $day_of_week=$this->choose_day_of_week($j);
               
                $this->submit_a_schedule($route_ids[$i],$day_of_week, '9:00am',$faker);
                $this->submit_a_schedule($route_ids[$i],$day_of_week, '12:00am',$faker);
                $this->submit_a_schedule($route_ids[$i],$day_of_week, '2:00pm',$faker);
            }
            
        }
        
    }
    
    private function choose_day_of_week($i){
       switch($i){
        case 0: return 'monday';
        break;
        case 1: return 'tuesday';
        break;
        case 2: return 'wednesday';
        break;
        case 3: return 'thursday';
        break;
        case 4: return 'friday';
        break;
        case 5: return 'saturday';
        break;
        case 6: return 'sunday';
        break;
        default: return 'monday';
        break;
       }
    }

    private function submit_a_route($origin_id,$destination_id,$faker){
        $DataToConsider=$this->get_a_random_intial_Date($faker);
        $min_hours=array_random([6,5,7,8,9,10,12,11]);
        $max_hours=($min_hours+2);
        return Routes::create([
            "origin_id"=>$origin_id,
            "destination_id"=>$destination_id, 
            "min_hours_taken"=>$min_hours,
            "max_hours_taken"=>$max_hours,
            "cost"=> 1000*(  (int) (($max_hours*10000)/3000) ),
            "created_at"=>$DataToConsider,
        ]);
    }
    
    private function submit_a_town($name,$faker){
        $DataToConsider=$this->get_a_random_intial_Date($faker);
        return Towns::create([
            "name"=>$name,
            "country"=>'Uganda', 
            "bus_stage"=>$name."bus park",
            "created_at"=>$DataToConsider,
        ]);;
    }

    
    private function submit_a_schedule($route_id,$day_of_week,$time,$faker){
        $DataToConsider=$this->get_a_randomPastDate($faker);

        return Schedules::create([
            "day_of_week"=>$day_of_week,
            "route_id"=>$route_id,
            "created_at"=>$DataToConsider, 
            "departure_time"=>$time,            
        ]);;
    }

  

    private function generateUser_and_book($faker){
        for ($i=0; $i < 200; $i++) {
            $DataToConsider=$this->get_a_randomPastDate($faker);

            $user=$this->register_a_user($faker,$DataToConsider);
            $this->book_a_bus_ticket($faker,$DataToConsider,$user->id);
        }
  
    }
    private function  book_a_bus_ticket($faker,$DataToConsider,$user_id){

        $departure_schedule=$this->get_schedule_forDate($DataToConsider,$faker);
        $paid=$this->generate_payment($faker);
        $this->submit_a_booking($paid,$DataToConsider, $user_id,$departure_schedule);
       
    }
    private function get_schedule_forDate($DataToConsider,$faker){
       // $day_of_week= lcfirst(\Carbon\Carbon::parse('2011-01-19 15:10:02')->format('l'));
        $day_of_week= lcfirst($DataToConsider->format('l'));
       
        $existing_schedules = Schedules::all()->where('day_of_week',$day_of_week)->pluck('id')->toArray();
      
        return $faker->randomElement($existing_schedules);
    }
    private function submit_a_booking($paid,$departure_date, $user_id,$departure_schedule){
        return Bookings::create([
            "paid"=>$paid,
            "favourite_seat"=>'off-window', 
            "travel_date"=>$departure_date,
            "ticket_number"=>str_random(10),
            "passanger_id"=>$user_id,
            "schedule_id"=>$departure_schedule,
        ]);;
    }
    private function generate_payment($faker){
        $fake_payments=[10000,20000,30000,25000];
        return $faker->randomElement($fake_payments);
    }
    public function get_a_random_existingUser_id($faker){
        $existing_users_ids = User::all()->pluck('id')->toArray();
        $user_id=$faker->randomElement($existing_users_ids);
        return $user_id;
    }
    private function get_a_randomPastDate($faker){
        $startDate = '-20 years';
        $endDate = 'now';
        $timezone = null;
        return $faker->dateTimeBetween($startDate, $endDate, $timezone);
    }
    private function get_a_random_intial_Date($faker){
        $startDate = '-21 years';
        $endDate = '-20 years';
        $timezone = null;
        return $faker->dateTimeBetween($startDate, $endDate, $timezone);
    }
    
    public function register_a_user($faker,$DataToConsider){
       return User::create([
            'name' => $faker->name ,
            'email' =>  $faker->unique()->safeEmail ,
            'password' => bcrypt('secret'),
            'created_at' => $DataToConsider,
        ]);
    }

}
