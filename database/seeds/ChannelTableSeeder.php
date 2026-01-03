<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' =>'laravel','slug'=> str_slug('laravel')];
        $channel2 = ['title' =>'vuejs','slug'=> str_slug('vue js')];
        $channel3 = ['title' =>'php 7', 'slug' => str_slug('php 7')];
        $channel4 = ['title' =>'html5' ,'slug' => str_slug('html5')];
        $channel5 = ['title' =>'reactjs','slug'=> str_slug('reactjs')];
           $channel6 = ['title' =>'angularjs', 'slug' => str_slug('angularjs')];

           $channel7 = ['title' =>'javascript' , 'slug'=> str_slug('javascript')];
        Channel::create($channel1);
        Channel::create($channel2);

        Channel::create($channel3);

        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
    }
}
