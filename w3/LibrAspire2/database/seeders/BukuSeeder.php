<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'judul' => 'Atomic Habits',
                'isbn' => '9786020633176',
                'pengarang' => 'James Clear',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2019,
                'kategori_id' => 1,
                'sinopsis' => 'Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa adalah buku kategori self improvement karya James Clear. Pada umumnya, perubahan-perubahan kecil seringkali terkesan tak bermakna karena tidak langsung membawa perubahan nyata pada hidup suatu manusia. Jika diumpamakan sekeping koin tidak bisa menjadikan kaya, suatu perubahan positif seperti meditasi selama satu menit atau membaca buku satu halaman setiap hari mustahil menghasilkan perbedaan yang bisa terdeteksi. Namun hal tersebut tidak sejalan dengan pemikiran James Clear, ia merupakan seorang pakar dunia yang terkenal dengan habits atau kebiasaan. Ia tahu bahwa tiap perbaikan kecil bagaikan menambahkan pasir ke sisi positif timbangan dan akan menghasilkan perubahan nyata yang berasal dari efek gabungan ratusan bahkan ribuan keputusan kecil. Ia menamakan perubahan kecil yang membawa pengaruh yang luar biasa dengan nama atomic habits. Dalam buku ini James Clear, seorang penulis sekaligus pembicara yang sangat terkenal akan topik habit memaparkan bahwa pada hakikatnya sebuah perubahan kecil (Atomic Habit) sering dianggap remeh, sebenarnya akan memberikan hasil yang sangat menjanjikan dalam hidup. Yang dipandang penting dalam perubahan perilaku bukan satu persen perbaikan tunggal, melainkan ribuan perbaikan atau sekumpulan atomic habits yang saling bertumpuk dan menjadi unit dasar dalam suatu sistem yang penting. James Clear menjelaskan bahwa terdapat tiga tingkat perubahan yaitu perubahan hasil, perubahan proses, dan perubahan identitas. Cara paling efektif dalam mengubah kebiasaan adalah bukan berfokus pada apa yang ingin dicapai, melainkan tipe orang seperti apa yang diinginkan. Identitas seseorang muncul dari kebiasaan yang dilakukan setiap harinya. Alasan utama kebiasaan penting karena kebiasaan dapat mengubah keyakinan tentang diri sendiri. Clear juga memperkenalkan empat Kaidah Perubahan Perilaku untuk membantu mengubah perilaku manusia yaitu menjadikannya terlihat, menjadikannya menarik, menjadikannya mudah, menjadikannya memuaskan. Keempat kaidah ini tidak hanya mengajari kita cara menciptakan kebiasaan-kebiasaan baru, melainkan menyingkapi sejumlah wawasan menarik tentang perilaku manusia.',
                'cover' => 'atomichabits.jpg',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Novel Akar: Supernova',
                'isbn' => '9786028811712',
                'pengarang' => 'Dewi Lestari',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2012,
                'kategori_id' => 2,
                'sinopsis' => 'Talita Luna <br> Kesejatian hidup ada pada batu kerikil yang tertendang ketika kau melangkah menyusuri jalan. Kesejatian hidup ada pada selembar daun kering yang gugur tertiup angin. Kesejatian hidup ada air susu ibu yang yang merelakan puting payudaranya dihisap oleh bayi manapun. Di Vihara Pit Yong Kiong, Pasuruan, di pelabuhan Belawan, di Penang, di Bangkok, di Laos, di Golden Triangle, di Cambodia, di Bandung, dimanapun kau hidup. Tapi, dia mungkin tak terlihat pada arus politik yang menyudutkanmu pada pilihan kedigdayaan. Dia menyembunyikan diri dari teriakan-teriakan yang menggerakan perubahan. Kesejatian hidup tak memerlukan perubahan, namun juga tak menampiknya. Dia rebah pada semua kesederhanaan yang ada di sekelilingmu. Maka, carilah, dan kamu akan mendapatkannya. Ketuklah, maka pintu akan dibukakan bagimu. Mintalah, maka kamu akan diberi. <br> Demikianlah Dewi Lestari mewakilkan sebuah upaya pencarian kesejatian hidup pada seorang tokoh bernama Bodhi. Seorang bayi yang di suatu pagi tergeletak di pintu Vihara. Dipungut, diasuh, dan dididik oleh seorang Pandita, Guru Liong. Merasa bahwa karma pada hidup masa lalunya sangat berat. 18 tahun dididik dengan ketat, termasuk penguasaan terhadap sebuah ilmu bela diri, Bodhi mengalami penyempurnaan batin. Pemurnian spirit. Termasuk sejumlah pengalaman uniknya yang "merasa" menjadi ulat, tikus got, kucing, dan sapi. <br> 18 tahun adalah waktu yang cukup, dan Bodhi mohon pamit. Bersama serombongan pendeta Buddha, Bodhi menyeberang ke Sumatera dan memutuskan menetap di daerah Belawan. Tanpa KTP, tak juga paham mengenai asal usul dan tanggal kelahirannya. Bekerja tiga bulan, mendapat upah, dan dibantu oleh Ompu Berlin untuk mendapatkan sejumlah dokumen identitas termasuk paspor, Bodhi menyeberang ke Penang. Disana dia bertemu dengan sejumlah backpackers yang kemudian "memberi" arah perjalanan berikutnya: Bangkok.',
                'cover' => null,
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'A Master Novel : Trophy Book One The Winner Award',
                'isbn' => '9786237211488',
                'pengarang' => 'Naya A',
                'penerbit' => 'Romancious',
                'tahun_terbit' => 2020,
                'kategori_id' => 2,
                'sinopsis' => 'Siapa sangka, mengembalikan dompet pria asing justru membuat Nara terjebak ke dalam sebuah permainan seorang psikopat?
                Nara diculik oleh seorang pria psikopat bernama Jeon Jehyun. Ia disiksa dan dijadikan trophy Jehyun—sebuah reward untuk diri Jehyun sendiri yang telah berhasil bertahan hidup dari masa lalunya yang kelam. Namun ternyata, menjadi trophy milik seorang pria kaya bukanlah hal yang indah. Nara harus menerima semua perlakuan gila Jehyun, apa pun itu. Ia tidak bisa menemukan jalan keluar karena Jehyun selalu membayanginya dengan ketiga asistennya—Mark, Doyoun, dan Hendry. Permainan Jehyun semakin menggila ketika Seo Jun—mantan kekasih Nara—datang dan ingin merebut Nara.  Lantas, berhasilkah mereka semua keluar dari permainan gila Jehyun? Siapakah dari mereka yang akan menjadi pemenang permainan, dan mendapatkan trophy berharga itu?',
                'cover' => null,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'As Long As the Lemon Trees grow',
                'isbn' => '9780132350884',
                'pengarang' => 'Robert C. Martin',
                'penerbit' => 'Waterlily',
                'tahun_terbit' => 2024,
                'kategori_id' => 2,
                'sinopsis' => '
                                A year ago, before the revolution, Salama watched her brother marry her best friend, Layla, and wondered when her own love story might begin. Now she works at the hospital - helping those she can, closing the eyes of those she cant. Layla and her unborn baby are all Salama has left.

                                Unless you count Khawf. But hes a hallucination; a symptom of the horrors shes seen. Every day he urges Salama to leave. Every day she refuses.

                                Until she crosses paths with Kenan, the boy with the vivid green eyes, who wants to stay and risk his life for everything Syria could be .

                            

                                Have you ever thought how interesting the world that opens wide through the pages of a book is? Reading is not only a routine activity, but also an unlimited adventure in imagination and knowledge. Reading sharpens the mind, opens horizons, and enriches insight. It is the door to the infinite world beyond us. Set a specific time to read every day. 

                                From reading before bed to making time in the morning, reading habits can be formed with consistency. Choose books according to your interests and literacy level. Start with a book that suits your reading desires and abilities. Find a quiet, comfortable place to read. Sufficient lights, comfortable chairs, and a little music can create a better reading experience. completion in reading groups or literacy forums. Discuss the books you read and get recommendations from fellow readers. Make notes or a journal about the books you have read. 

                                Write down your thoughts, impressions, and lessons learned. Involve the family in reading activities. Read stories to children or invite them to read together. It creates close family bonds through positive activities. Feel free to explore new genres. Sometimes, the best surprises come from books you never imagined you would enjoy. Take advantage of technology by reading digital books or joining an online literacy community. This opens up opportunities to connect with readers from all over the world.',
                'cover' => 'aslongasthelemontreesgrow.png',
                'stock' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bali: The Journey in Heaven on Earth',
                'isbn' => '9780857197689',
                'pengarang' => 'Indah P',
                'penerbit' => 'Penerbit Buku Kompas',
                'tahun_terbit' => 2020,
                'kategori_id' => 2,
                'sinopsis' => 'Bali: The Journey in Heaven on Earth is a collection of poems that conveys messages of hope, love and admiration for the island of Bali. This compilation is filled with poems that carry profound meaning for the author and is adorned with beautiful illustrations that portray the wonder and beauty of Bali. Taken together, the works are sure to warm the readers heart and imbue it with a wellspring of inspiration that will last an eternity.

                                This is the last paradise on earth, a hidden heaven along the ocean. Encircled by the temples. Surrounded by the sea. A place renowned for  its serenity. An encounter with a place, a contingence and even the mundane can produce deeply impressive works of art. This collection of poems from Indah tells of an inner journey, and Bali, with its immeasurable allure, becomes a reflection of its very essence.Reaching beyond the visible world, readers will become acquainted with the depths of sensation.

                                Author and artist Indah Ps latest book, Bali: A Journey in Heaven on Earth combines poetry and painting on the island of the gods. The author says that his love for the island of Bali inspired him to write and paint the beauty of Bali through letters and colors on canvas. A deep sense of sacredness, natural beauty, the majesty of art and culture and the nobility of the people of the island of Bali prompted Indah to write this collection of poems.

                                Deskripsi in Indonesia
                                Bali: The Journey in Heaven on Earth adalah kumpulan puisi yang menyampaikan pesan harapan, cinta, dan kekaguman terhadap pulau Bali. Kompilasi ini diisi dengan puisi-puisi yang membawa makna mendalam bagi penulisnya dan dihiasi dengan ilustrasi indah yang menggambarkan keajaiban dan keindahan Bali. Secara keseluruhan, karya-karya tersebut pasti akan menghangatkan hati pembaca dan mengilhaminya dengan sumber inspirasi yang akan bertahan selamanya. Ini adalah surga terakhir di bumi, surga tersembunyi di sepanjang lautan. Dikelilingi oleh kuil-kuil, dikelilingi oleh laut. Tempat yang terkenal dengan ketenangannya. Perjumpaan dengan suatu tempat, kontingensi, dan bahkan duniawi dapat menghasilkan karya seni yang sangat mengesankan. Kumpulan puisi Indah ini menceritakan perjalanan batin dan Bali dengan daya pikatnya yang tak terkira sehingga menjadi cerminan dari esensinya. Mencapai melampaui dunia kasat mata, pembaca akan berkenalan dengan kedalaman sensasi.

                                Buku terbaru penulis dan seniman Indah P, Bali: Perjalanan ke Surga di Bumi yang menggabungkan puisi dan lukisan di pulau dewata. Penulis mengatakan kecintaannya pada pulau Bali yang menginspirasinya untuk menulis dan melukis keindahan Bali melalui huruf dan  warna di atas kanvas. Rasa yang mendalam akan kesakralan, keindahan alam, keagungan seni budaya dan keluhuran masyarakat pulau Bali mendorong Indah untuk menulis kumpulan puisi ini.',
                'cover' => 'bali.png',
                'stock' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'The Heaven & Earth Grocery Store',
                'isbn' => '9780593714669',
                'pengarang' => 'James McBride',
                'penerbit' => 'Waterlily',
                'tahun_terbit' => 2025,
                'kategori_id' => 2,
                'sinopsis' => 'In 1972, when workers in pottstown, pennsylvania, were digging the foundations for a new development, the last thing they expected to find was a skeleton at the bottom of a well. Who the skeleton was and how it got there were two of the long-held secrets kept by the residents of chicken hill, the dilapidated neighbourhood where immigrant jews and african americans lived side by side and shared ambitions and sorrows. 

                As these characters stories overlap and deepen, it becomes clear how much the people who live on the margins struggle and what they must do to survive. When the truth is finally revealed about what happened on chicken hill and the part the towns white establishment played in it, mcbride shows us that even in dark times, it is love and community-heaven and earth-that sustain us.',
                'cover' => 'theheavenandearthgrocerystore.png',
                'stock' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'The Big Four (Empat Besar)',
                'isbn' => '9789792228632',
                'pengarang' => 'Agatha Christie',
                'penerbit' => 'Penguin Random House',
                'tahun_terbit' => 2018,
                'kategori_id' => 2,
                'sinopsis' => 'Di dalam gudang bawah tanah di East End itu, aku yakin inilah saat-saatku yang terakhir. Kusiapkan diriku menghadapi shock derasnya arus air yang hitam itu.
 
Aku terkejut ketika mendengar tawa bernada rendah. ""Anda pemberani,"" kata laki-laki di sofa itu. ""Kami orang Timur menghargai keberanian. Anda telah berani menghadapi kematian Anda sendiri. Dapatkah Anda menghadapi kematian orang lain pula?""
 
Dahiku bersimbah peluh.
 
""Pena sudah siap,"" kata laki-laki itu dengan tersenyum. ""Anda tinggal menulis. Kalau tidak...""
 
""Kalau tidak?"" tanyaku tegang.
 
""Kalau tidak, wanita yang Anda cintai akan mati... perlahan-lahan. Dalam waktu senggangnya, majikan kami suka menghibur diri dengan membuat alat-alat dan menciptakan cara-cara penyiksaan...."""',
                'cover' => 'thebigfour.png',
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Percy Jackson #2: The Sea Of Monsters',
                'isbn' => '9786232422544',
                'pengarang' => 'Rick Riordan',
                'penerbit' => 'NOURA BOOKS PUBLISHING',
                'tahun_terbit' => 2021,
                'kategori_id' => 2,
                'sinopsis' => 'Kau pikir hidupku kembali tenang setelah berhasil mencegah perang besar antar dewa? Tentu saja tidak. Aku terus dihantui mimpi tentang Grover, sahabat satirku, yang sepertinya hendak dinikahi paksa oleh Cyclops jahat. Lalu, aku membakar gimnasium sekolah tanpa sengaja—salahkan para raksasa! Perkemahan Blasteran bahkan menghadapi serangan dari banteng-banteng yang suka bikin gosong orang.

Nah, kabur dari perkemahan demi menyelamatkan Grover, itu baru menegangkan! Terutama karena kami harus mengarungi Laut Para Monster yang menyamar menjadi Segitiga Bermuda, yang mengisap apa pun yang melintas di atasnya. Aku dan Annabeth bahkan sempat tersesat di sebuah pulau, dimana aku dikutuk menjadi.. Tidak mau bilang. Kejadian traumatis.

Mana ramalan mengerikannya, kau bilang? Baiklah, katanya salah satu anak dari Dewa Tiga Besar akan menimbulkan perang terbesar dalam sejarah ketika menginjak usia 16 tahun. Yang kemungkinan besar adalah aku. Yang berarti semua dewa kini berminat untuk membinasakanku.

Percy Jackson,
Setelah tahu rahasia besar Chiron, Trailer centaur.
',
                'cover' => 'pjo2.png',
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Five Nights At Freddy`S Graphic Novel #1: The Silver Eyes',
                'isbn' => '9781338298482',
                'pengarang' => 'Scott Caethon',
                'penerbit' => 'Scholastic',
                'tahun_terbit' => 2020,
                'kategori_id' => 2,
                'sinopsis' => 'Five Nights At Freddy`S Graphic Novel #1: The Silver Eyes',
                'cover' => 'fnafthesilvereyes.png',
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Five Nights At Freddys Graphic Novel #2: The Twisted Ones',
                'isbn' => '9781338629767',
                'pengarang' => 'Scott Caethon',
                'penerbit' => 'Scholastic',
                'tahun_terbit' => 2021,
                'kategori_id' => 2,
                'sinopsis' => 'Five Nights At Freddys Graphic Novel #2: The Twisted Ones.',
                'cover' => null,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}