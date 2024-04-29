<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Album::create([
            'title' => 'The Fame Monster',
            'album_cover' => 'album_covers/The_Fame_Monster.png',
            'artist' => 'Lady Gaga',
            'release_year' => '2009',
            'description' => "The Fame Monster is a reissue of American singer Lady Gaga's debut studio album, The Fame, and was released on November 18, 2009, through Interscope Records. Initially planned solely as a deluxe edition reissue of The Fame, Interscope later decided to release the eight new songs as a standalone EP in some territories.,",
            'price' => 12.99,
        ]);

        Album::create([
            'title' => 'Born This Way',
            'album_cover' => 'album_covers/Born_This_Way_album_cover.jpg',
            'artist' => 'Lady Gaga',
            'release_year' => '2011',
            'description' => "Born This Way is the second studio album by American singer Lady Gaga, released by Interscope Records on May 23, 2011. It was co-written and co-produced by Gaga with other producers, including Fernando Garibay and RedOne, who had previously worked with her.",
            'price' => 18.99,
        ]);

        Album::create([
            'title' => 'Post',
            'album_cover' => 'album_covers/im1hg5x5.bmp',
            'artist' => 'Bjork',
            'release_year' => '1997',
            'description' => "Post is the second studio album by Icelandic singer Björk. It was released on 7 June 1995 by One Little Indian Records.",
            'price' => 14.59,
        ]);

        Album::create([
            'title' => 'Back To Black',
            'album_cover' => 'album_covers/Amy_Winehouse_-_Back_To_Black_(Deluxe_Edition).jpg',
            'artist' => 'Amy Winehouse',
            'release_year' => '2006',
            'description' => "Singer Amy Winehouse's tumultuous relationship with Blake Fielder-Civil inspires her to write and record the groundbreaking album Back to Black.",
            'price' => 12.99,
        ]);

        Album::create([
            'title' => 'Born To Die',
            'album_cover' => 'album_covers/kpdfy62c.bmp',
            'artist' => 'Lana Del Rey',
            'release_year' => '2011',
            'description' => "Born to Die is the second studio album and major-label debut by American singer-songwriter Lana Del Rey. It was released on January 27, 2012, through Interscope Records and Polydor Records. A reissue of the album, subtitled The Paradise Edition, was released on November 9, 2012. The new material from the reissue was also made available on a separate EP titled Paradise. ",
            'price' => 24.99,
        ]);

    }
}
