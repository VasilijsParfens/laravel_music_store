<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\User;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Mood;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        Album::create([
            'title' => 'The Fame Monster',
            'album_cover' => 'album_covers/The_Fame_Monster.png',
            'artist' => 'Lady Gaga',
            'release_year' => '2009',
            'description' => "The Fame Monster is a reissue of American singer Lady Gaga's debut studio album, The Fame, and was released on November 18, 2009, through Interscope Records. Initially planned solely as a deluxe edition reissue of The Fame, Interscope later decided to release the eight new songs as a standalone EP in some territories.,",
            'price' => 12.99,
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

        Album::create([
            'title' => '1989',
            'album_cover' => 'album_covers/Taylor_Swift_-_1989.jpeg',
            'artist' => 'Taylor Swift',
            'release_year' => '2014',
            'description' => "1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014, through Big Machine Records. Inspired by 1980s synth-pop to create a record that shifted her sound and image from country to mainstream pop, Swift enlisted Max Martin as co-executive producer and named the album after her birth year.",
            'price' => 14.99,
        ]);

        Album::create([
            'title' => '30',
            'album_cover' => 'album_covers/Adele_-_30.png',
            'artist' => 'Adele',
            'release_year' => '2021',
            'description' => "30 is the fourth studio album by the English singer and songwriter Adele. It was released on 19 November 2021 by Columbia Records. Her first studio album in six years following 25, 30 was inspired by Adele's experiences and anxiety following her divorce and its impact on her son's life, along with motherhood and fame.",
            'price' => 16.99,
        ]);

        Album::create([
            'title' => 'Red',
            'album_cover' => 'album_covers/Taylor_Swift_-_Red.png',
            'artist' => 'Taylor Swift',
            'release_year' => '2012',
            'description' => "Red is the fourth studio album by American singer-songwriter Taylor Swift. It was released on October 22, 2012, by Big Machine Records. She co-wrote the album with a variety of collaborators including Max Martin, Shellback, and Dan Wilson.",
            'price' => 11.99,
        ]);

        Album::create([
            'title' => '21',
            'album_cover' => 'album_covers/Adele_-_21.png',
            'artist' => 'Adele',
            'release_year' => '2011',
            'description' => "21 is the second studio album by British singer-songwriter Adele. It was released on 24 January 2011 in Europe and on 22 February 2011 in North America by XL Recordings and Columbia Records. The album was named after the age of the singer during its production.",
            'price' => 15.99,
        ]);

        Album::create([
            'title' => 'Abbey Road',
            'album_cover' => 'album_covers/The_Beatles_-_Abbey_Road.jpg',
            'artist' => 'The Beatles',
            'release_year' => '1969',
            'description' => "Abbey Road is the eleventh studio album by the English rock band the Beatles, released on 26 September 1969 by Apple Records. Named after the location of EMI Studios in London, the cover features the group walking across the street's zebra crossing, an image that became one of the most famous and imitated in popular music.",
            'price' => 20.99,
        ]);

        Album::create([
            'title' => 'Thriller',
            'album_cover' => 'album_covers/Michael_Jackson_-_Thriller.png',
            'artist' => 'Michael Jackson',
            'release_year' => '1982',
            'description' => "Thriller is the sixth studio album by American singer Michael Jackson, released on November 30, 1982, by Epic Records. It explores genres similar to Jackson's previous album, Off the Wall, including pop, post-disco, rock, and funk.",
            'price' => 22.99,
        ]);

        Album::create([
            'title' => 'The Wall',
            'album_cover' => 'album_covers/Pink_Floyd_The_Wall.jpeg',
            'artist' => 'Pink Floyd',
            'release_year' => '1979',
            'description' => "The Wall is the eleventh studio album by the English rock band Pink Floyd, released on 30 November 1979 by Harvest and Columbia Records. It is a rock opera that explores themes of abandonment and personal isolation.",
            'price' => 22.99,
        ]);

        Album::create([
            'title' => 'Bad',
            'album_cover' => 'album_covers/Michael_Jackson_-_Bad.png',
            'artist' => 'Michael Jackson',
            'release_year' => '1987',
            'description' => "Bad is the seventh studio album by American singer Michael Jackson, released on August 31, 1987, by Epic Records. The album features appearances from Stevie Wonder, Siedah Garrett, and even a duet with Prince.",
            'price' => 20.99,
        ]);

        Album::create([
            'title' => 'Animal',
            'album_cover' => 'album_covers/AnimalKesha.png',
            'artist' => 'Kesha',
            'release_year' => '2010',
            'description' => "Animal is the debut studio album by American singer Kesha, released on January 1, 2010, by RCA Records. The album's sound is primarily pop, with elements of dance-pop, electro-pop, and synth-pop.",
            'price' => 13.99,
        ]);

        Album::create([
            'title' => 'Warrior',
            'album_cover' => 'album_covers/Kesha_Warrior.jpeg',
            'artist' => 'Kesha',
            'release_year' => '2012',
            'description' => "Warrior is the second studio album by American singer Kesha, released on November 30, 2012, by Kemosabe and RCA Records. The album features contributions from various producers, including Dr. Luke, Benny Blanco, Cirkut, and Max Martin.",
            'price' => 14.99,
        ]);

        Album::create([
            'title' => 'High Road',
            'album_cover' => 'album_covers/Kesha_-_High_Road.png',
            'artist' => 'Kesha',
            'release_year' => '2020',
            'description' => "High Road is the fourth studio album by American singer Kesha, released on January 31, 2020, by RCA Records. The album features collaborations with various artists, including Big Freedia, Brian Wilson, Sturgill Simpson, and Wrabel.",
            'price' => 16.99,
        ]);

        Album::create([
            'title' => 'The Fame',
            'album_cover' => 'album_covers/Lady_Gaga_–_The_Fame_album_cover.png',
            'artist' => 'Lady Gaga',
            'release_year' => '2008',
            'description' => "The Fame is the debut studio album by American singer Lady Gaga, released on August 19, 2008, by Interscope Records. The album incorporates elements of synth-pop, dance-pop, and electropop, and features contributions from various producers, including RedOne, Martin Kierszenbaum, and Rob Fusari.",
            'price' => 14.99,
        ]);

        Album::create([
            'title' => 'Chromatica',
            'album_cover' => 'album_covers/Lady_Gaga_-_Chromatica_(Official_Album_Cover).png',
            'artist' => 'Lady Gaga',
            'release_year' => '2020',
            'description' => "Chromatica is the sixth studio album by Lady Gaga, released on May 29, 2020, by Interscope Records. The album features a return to dance-pop and electropop, with themes of resilience and escapism.",
            'price' => 19.99,
        ]);

        Album::create([
            'title' => 'Arrival',
            'album_cover' => 'album_covers/ABBA_-_Arrival.png',
            'artist' => 'ABBA',
            'release_year' => '1976',
            'description' => "Arrival is the fourth studio album by Swedish pop group ABBA, released on 11 October 1976 by Polar Records. The album features hit singles such as 'Dancing Queen', 'Money, Money, Money', and 'Knowing Me, Knowing You'.",
            'price' => 16.99,
        ]);

        Album::create([
            'title' => 'Voulez-Vous',
            'album_cover' => 'album_covers/Voulez_Vous.jpeg',
            'artist' => 'ABBA',
            'release_year' => '1979',
            'description' => "Voulez-Vous is the sixth studio album by ABBA, released on 23 April 1979 by Polar Records. The album includes popular tracks such as 'Chiquitita' and 'Does Your Mother Know'.",
            'price' => 18.99,
        ]);

        Album::create([
            'title' => 'Good Girl Gone Bad',
            'album_cover' => 'album_covers/Rihanna_-_Good_Girl_Gone_Bad.png',
            'artist' => 'Rihanna',
            'release_year' => '2007',
            'description' => "Good Girl Gone Bad is the third studio album by Barbadian singer Rihanna, released on May 31, 2007, by Def Jam Recordings. The album marked a departure from her previous styles, incorporating more dance-pop and uptempo songs.",
            'price' => 14.99,
        ]);

        Album::create([
            'title' => 'Rated R',
            'album_cover' => 'album_covers/Rihanna_-_Rated_R.png',
            'artist' => 'Rihanna',
            'release_year' => '2009',
            'description' => "Rated R is the fourth studio album by Rihanna, released on November 20, 2009, by Def Jam Recordings. The album explores darker themes and incorporates elements of hip hop, rock, and dubstep.",
            'price' => 15.99,
        ]);

        Album::create([
            'title' => 'Loud',
            'album_cover' => 'album_covers/Rihanna_-_Loud.png',
            'artist' => 'Rihanna',
            'release_year' => '2010',
            'description' => "Loud is the fifth studio album by Rihanna, released on November 12, 2010, by Def Jam Recordings. The album features uptempo dance-pop and electro-R&B songs, including the hit singles 'Only Girl (In the World)' and 'What's My Name?'",
            'price' => 16.99,
        ]);
        // Seeding comments
        Comment::create(['user_id' => 1,'album_id' => 1,'text' => 'Wow this is such an amazing album!',]);
        Comment::create(['user_id' => 2, 'album_id' => 3, 'text' => 'This album is pure gold!']);
        Comment::create(['user_id' => 3, 'album_id' => 4, 'text' => 'Absolutely love the vibes of this album!']);
        Comment::create(['user_id' => 4, 'album_id' => 5, 'text' => 'An album that speaks to the heart!']);
        Comment::create(['user_id' => 5, 'album_id' => 6, 'text' => 'Brilliant composition, every track is a hit!']);
        Comment::create(['user_id' => 6, 'album_id' => 7, 'text' => 'This album is a true masterpiece!']);
        Comment::create(['user_id' => 7, 'album_id' => 8, 'text' => 'Lost in the beauty of this album!']);
        Comment::create(['user_id' => 8, 'album_id' => 9, 'text' => 'An album that deserves all the praise!']);
        Comment::create(['user_id' => 9, 'album_id' => 10, 'text' => 'Such a refreshing sound, can\'t get enough of it!']);
        Comment::create(['user_id' => 10, 'album_id' => 11, 'text' => 'A symphony of perfection, hats off to the artist!']);
        Comment::create(['user_id' => 11, 'album_id' => 12, 'text' => 'This album is like a breath of fresh air!']);
        Comment::create(['user_id' => 12, 'album_id' => 13, 'text' => 'Each track is a work of art, simply mesmerizing!']);
        Comment::create(['user_id' => 13, 'album_id' => 14, 'text' => 'Epic beats that resonate deeply!']);
        Comment::create(['user_id' => 14, 'album_id' => 15, 'text' => 'A journey through sound that captivates the soul!']);
        Comment::create(['user_id' => 15, 'album_id' => 16, 'text' => 'This album sets the bar high for excellence!']);
        Comment::create(['user_id' => 16, 'album_id' => 17, 'text' => 'Music that touches the heart in profound ways!']);
        Comment::create(['user_id' => 17, 'album_id' => 18, 'text' => 'An album that will be on repeat for days!']);
        Comment::create(['user_id' => 18, 'album_id' => 19, 'text' => 'Absolutely mind-blowing, a must-listen for everyone!']);
        Comment::create(['user_id' => 19, 'album_id' => 20, 'text' => 'This album is pure magic, can\'t stop listening!']);
        Comment::create(['user_id' => 20, 'album_id' => 21, 'text' => 'A sonic adventure that leaves me speechless!']);
        Comment::create(['user_id' => 1, 'album_id' => 22, 'text' => 'Wow, this album exceeded all expectations!']);
        Comment::create(['user_id' => 2, 'album_id' => 1, 'text' => 'This album is pure fire, can\'t stop listening!']);
        Comment::create(['user_id' => 3, 'album_id' => 1, 'text' => 'Absolutely love the vibes of this album!']);
        Comment::create(['user_id' => 4, 'album_id' => 1, 'text' => 'An album that speaks to the heart!']);
        Comment::create(['user_id' => 5, 'album_id' => 2, 'text' => 'Absolutely blown away by the talent on display!']);
        Comment::create(['user_id' => 6, 'album_id' => 2, 'text' => 'This album is the soundtrack to my life!']);
        Comment::create(['user_id' => 7, 'album_id' => 2, 'text' => 'A symphony of emotions that resonates deeply!']);
        Comment::create(['user_id' => 8, 'album_id' => 3, 'text' => 'An album that gets better with every listen!']);
        Comment::create(['user_id' => 9, 'album_id' => 3, 'text' => 'This album takes me on a journey to another world!']);
        Comment::create(['user_id' => 10, 'album_id' => 3, 'text' => 'Absolutely phenomenal, can\'t get enough of it!']);
        Comment::create(['user_id' => 11, 'album_id' => 4, 'text' => 'This album is a masterpiece in every sense!']);
        Comment::create(['user_id' => 12, 'album_id' => 4, 'text' => 'Incredible beats that keep me coming back for more!']);
        Comment::create(['user_id' => 13, 'album_id' => 4, 'text' => 'An album that touches the soul deeply!']);
        Comment::create(['user_id' => 14, 'album_id' => 5, 'text' => 'Lost in the melodies, this album is pure bliss!']);
        Comment::create(['user_id' => 15, 'album_id' => 5, 'text' => 'This album deserves all the accolades it receives!']);
        Comment::create(['user_id' => 16, 'album_id' => 5, 'text' => 'A timeless classic that will be cherished for years to come!']);
        Comment::create(['user_id' => 17, 'album_id' => 6, 'text' => 'This album is the definition of perfection!']);
        Comment::create(['user_id' => 18, 'album_id' => 6, 'text' => 'An album that resonates with me on a deep level!']);
        Comment::create(['user_id' => 19, 'album_id' => 7, 'text' => 'This album is my go-to for any mood!']);
        Comment::create(['user_id' => 20, 'album_id' => 7, 'text' => 'Bravo to the artist, this album is a masterpiece!']);
        Comment::create(['user_id' => 1, 'album_id' => 8, 'text' => 'A symphony of sound that enchants the senses!']);
        Comment::create(['user_id' => 2, 'album_id' => 8, 'text' => 'An album that I\'ll cherish forever!']);
        Comment::create(['user_id' => 3, 'album_id' => 9, 'text' => 'This album is a game-changer in the music industry!']);
        Comment::create(['user_id' => 4, 'album_id' => 9, 'text' => 'This album is a masterpiece in every sense!']);
        Comment::create(['user_id' => 5, 'album_id' => 10, 'text' => 'Incredible beats that keep me coming back for more!']);
        Comment::create(['user_id' => 6, 'album_id' => 10, 'text' => 'An album that touches the soul deeply!']);

        // Define user and album IDs
        $userIds = range(1, 20); // Assuming you have 20 users
        $albumIds = range(1, 22); // Assuming you have 22 albums

        // Loop through and create orders
        foreach ($userIds as $userId) {
            // Choose a random album ID
            $albumId = $albumIds[array_rand($albumIds)];

            // Fetch the album price from the database
            $albumPrice = DB::table('albums')->where('id', $albumId)->value('price');

            // Insert order into the database
            DB::table('orders')->insert([
                'user_id' => $userId,
                'album_id' => $albumId,
                'purchase_price' => $albumPrice,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed moods
        $moods = [
            'Happy', 'Sad', 'Energetic', 'Relaxed', 'Angry',
            'Romantic', 'Melancholic', 'Uplifted', 'Calm',
            'Excited', 'Nostalgic', 'Focused', 'Peaceful',
            'Reflective', 'Surprised', 'Content', 'Determined',
            'Hopeful', 'Anxious', 'Inspired'
        ];

        foreach ($moods as $mood) {
            Mood::create(['name' => $mood]);
        }

    }
}
