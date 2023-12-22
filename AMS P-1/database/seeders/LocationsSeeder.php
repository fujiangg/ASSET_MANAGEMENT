<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Location::count() === 0) {
            /**
            * FILKON 1
            */
            Location::create([
                'name' => 'Data Center (DC) & NDC Jatinegara',
                'address' => 'Jl. Raya Jatinegara Barat No.44, RT.1/RW.5, Kp. Melayu, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13320',
                'latitude' => '-6.214124534634148',
                'longitude' => '106.86163997935294',
            ]);
            Location::create([
                'name' => 'NDC Batam',
                'address' => 'Jl. Citra Lautan Teduh No.18, Tanjung Bemban, Batu Besar 29466',
                'latitude' => '1.167738072824604',
                'longitude' => '104.13757269449064',
            ]);
            Location::create([
                'name' => 'NDC Surabaya',
                'address' => 'Jl. Raya Tenggilis Mejoyo D-15, Rungkut, Surabaya 60292',
                'latitude' => '-7.319987730338254',
                'longitude' => '112.76230199591086',
            ]);
            Location::create([
                'name' => 'NDC Denpasar',
                'address' => 'Jl. Padanggalak Sanur No.287, Kesiman, Kec. Denpasar Timur, Kota Denpasar, Bali 80237',
                'latitude' => '-8.65779186206847',
                'longitude' => '115.2635059705045',
            ]);
            Location::create([
                'name' => 'NDC Palembang',
                'address' => 'Jl. Aspol Punti Kayu Km.6 No.7, Srijaya, Kec. Alang-Alang Lebar, Kota Palembang, Sumatera Selatan 30153',
                'latitude' => '-2.949695748935373',
                'longitude' => '104.73076595458416',
            ]);
            Location::create([
                'name' => 'NDC Medan',
                'address' => 'Jl. Gajah Mada No.32, Simpang Darusalam, Medan 55405',
                'latitude' => '3.585152595665269',
                'longitude' => '98.65332108346863',
            ]);
            Location::create([
                'name' => 'Data Center (DC) & Gedung Ketapang (KOS)',
                'address' => 'Jl. KH Zainul Arifin Gedung penunjang Lt 3',
                'latitude' => '-6.159986929026074',
                'longitude' => '106.81358196536625',
            ]);
            Location::create([
                'name' => 'Batam (KOS)',
                'address' => 'Jl. Raja isa Gedung PGN Lt 2 Batam Center',
                'latitude' => '1.1261529666500503',
                'longitude' => '104.05802201687261',
            ]);
            Location::create([
                'name' => 'STO Batam Center',
                'address' => 'Jl. Laksamana Bintan, Baloi Permai, Kec. Batam Kota, Kota Batam, Riau 29444',
                'latitude' => '1.1152610539468721',
                'longitude' => '104.05065776813562',
            ]);
            Location::create([
                'name' => 'PT. Telkom Bukit Dangas',
                'address' => 'Jl. Palapa Bukit Dangas, Sekupang, Batam, 29422',
                'latitude' => '1.123912132387209',
                'longitude' => '103.94157369447622',
            ]);
            Location::create([
                'name' => 'Paniki - Manado',
                'address' => 'Jl. Raya Paniki Atas, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara',
                'latitude' => '1.5099222256165314',
                'longitude' => '124.91451568421756',
            ]);
            Location::create([
                'name' => 'TTC Amir Hamzah',
                'address' => 'Jl. T. Amir Hamzah No. 20 medan barat kota Medan',
                'latitude' => '3.6071107368372477',
                'longitude' => '98.65935960158218',
            ]);
            Location::create([
                'name' => 'TTC Batam',
                'address' => 'Jl. Engku Putri Batam Center',
                'latitude' => '1.1309007016724502',
                'longitude' => '104.05784690643631',
            ]);
            Location::create([
                'name' => 'TTC Pekanbaru 1',
                'address' => 'Jl. Kenanga No. 75 Kel. Padang Bulan Kec. Senapelan',
                'latitude' => '0.532079594553765',
                'longitude' => '101.43615995409755',
            ]);
            Location::create([
                'name' => 'TTC Marpoyan',
                'address' => 'Jl. Arifin Achmad No 107, Pekanbaru',
                'latitude' => '0.4740679556463764',
                'longitude' => '101.42363757699398',
            ]);
            Location::create([
                'name' => 'TTC Palembang',
                'address' => 'Jl. Demang Lebar Daun no. 72 A, Hilir Barat 1, Palembang',
                'latitude' => '-2.977483752346256',
                'longitude' => '104.72536297170927',
            ]);
            Location::create([
                'name' => 'TTC TB Simatupang',
                'address' => 'Jl. TB Simatupang Kel Tanjung Barat Kec. Jagakarsa Kodya Jaksel',
                'latitude' => '-6.304665935743196',
                'longitude' => '106.84583445960497',
            ]);
            Location::create([
                'name' => 'TTC Buaran',
                'address' => 'Jl. Raden Inten II No.5, RT.9/RW.15, Duren Sawit, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta',
                'latitude' => '-6.2218515385924436',
                'longitude' => '106.92379539546137',
            ]);
            Location::create([
                'name' => 'TTC Dago',
                'address' => 'Jl. Ir. H.Juanda No. 252 Bandung',
                'latitude' => '-6.882322106453141',
                'longitude' => '107.61571089012345',
            ]);
            Location::create([
                'name' => 'TTC Soekarno Hatta',
                'address' => 'Jl. Soekarno Hatta No. 707 Rt 06/06 Kel. Jatisar Kec. Buah Batu Bandung',
                'latitude' => '-6.938461894294063',
                'longitude' => '107.66117212285188',
            ]);
            Location::create([
                'name' => 'TTC Gombel',
                'address' => 'Jl.Bukit Sari Raya No.10B Semarang',
                'latitude' => '-7.045154445454729',
                'longitude' => '110.42405832393925',
            ]);
            Location::create([
                'name' => 'TTC Solo Baru',
                'address' => 'Jl. Solo - Baki. Km 4 Gedangan- Grogol - Sukahorjo',
                'latitude' => '-7.604331273153936',
                'longitude' => '110.79639041111686',
            ]);
            Location::create([
                'name' => 'TTC Gayungan',
                'address' => 'Jl. Gayung Sari, No. 76 Surabaya',
                'latitude' => '-7.336167291361694',
                'longitude' => '112.72422421182456',
            ]);
            Location::create([
                'name' => 'TTC HR Muhammad',
                'address' => 'Jl. Hr Muhammad no. 46 Surabaya',
                'latitude' => '-7.285392772905246',
                'longitude' => '112.69801232954889',
            ]);
            Location::create([
                'name' => 'TTC Renon',
                'address' => 'Jl. Merdeka no 21 Denpasar',
                'latitude' => '-8.665494135839419',
                'longitude' => '115.23838695325398',
            ]);
            Location::create([
                'name' => 'STO Singaraja',
                'address' => 'Jl. Letkol Wisnu No.2 Banjar Jawa, Kec.Buleleng, Kab.Buleleng, Bali',
                'latitude' => '-8.11249652162649',
                'longitude' => '115.09194242698298',
            ]);
            Location::create([
                'name' => 'TTC Balikpapan',
                'address' => 'Jl. Achmad Yani No.1, Balikpapan',
                'latitude' => '-1.2574581646998308',
                'longitude' => '116.8400626069086',
            ]);
            Location::create([
                'name' => 'TTC Banjarmasin 2',
                'address' => 'Jl. Ahmad Yani Km 36.5, Simpang Empat Banjarbaru Kalimantan Selatan',
                'latitude' => '-3.441735982834988',
                'longitude' => '114.84762948901677',
            ]);
            Location::create([
                'name' => 'TTC Pontianak',
                'address' => 'Jl. Gusti Sulung Lelanang No. 5',
                'latitude' => '-0.03352800669159874',
                'longitude' => '109.33442236554141',
            ]);
            Location::create([
                'name' => 'TTC Makasar 1',
                'address' => 'Jl. Pengayoman No.1, Makassar',
                'latitude' => '-5.15803491559434',
                'longitude' => '119.43724414072567',
            ]);
            Location::create([
                'name' => 'TTC Makasar 2 (DC & KOS)',
                'address' => 'Jl. Perintis Kemerdekaan Km 17, Makasar',
                'latitude' => '-5.09197419586845',
                'longitude' => '119.51389915371921',
            ]);
            Location::create([
                'name' => 'STO Sorong',
                'address' => 'Jl. A. Yani No.06 Kota Sorong Kel. Remu Utara Kec. Sorong Prop. Papua Barat',
                'latitude' => '-0.8820606943173253',
                'longitude' => '131.2813683886595',
            ]);
            Location::create([
                'name' => 'TTC Jayapura',
                'address' => 'Jl. Baru Melati Kota Raja, Papua',
                'latitude' => '-2.6038186050963796',
                'longitude' => '140.6744052557078',
            ]);
            Location::create([
                'name' => 'TTC Timika',
                'address' => 'Jl. Cendrawasih SP 2, Papua',
                'latitude' => '-4.540937870306081',
                'longitude' => '136.87916359489245',
            ]);
            Location::create([
                'name' => 'TTC Manado 2',
                'address' => 'Jl. Raya Paniki Atas, Kel.Paniki Bawah, Kec. Mapanget, Manado',
                'latitude' => '1.5097823293377335',
                'longitude' => '124.91503842026442',
            ]);
            Location::create([
                'name' => 'TTC Lambaro',
                'address' => 'Jl. Soekarno Hatta Desa Lamblang Manyang Kec. Darul Imarah Kab. Aceh Besar',
                'latitude' => '5.511402742434522',
                'longitude' => '95.33761443522822',
            ]);
            Location::create([
                'name' => 'TTC Pematang Siantar',
                'address' => 'Jl. Bahkora II, Pematang Siantar',
                'latitude' => '2.9343899917981644',
                'longitude' => '99.07014765988642',
            ]);
            Location::create([
                'name' => 'TTC Jambi',
                'address' => 'Jl. Slamet Riyadi RT. 17 No. 03 Kel. Solok Sipin Kec. Danau Sipin Kota Jambi',
                'latitude' => '-1.6023593033393004',
                'longitude' => '103.59454595275587',
            ]);
            Location::create([
                'name' => 'TTC Lampung',
                'address' => 'Jl.Way Sekampung Atas No.8 Sumur Batu Telukbetung UTara Bandar Lampung',
                'latitude' => '-5.426866424798121',
                'longitude' => '105.26473999795215',
            ]);
            Location::create([
                'name' => 'STO Samarinda',
                'address' => 'Jl. Arga Mulya Dalam Kec. Samarinda Ulu Kodya Samarinda Kaltim',
                'latitude' => '-0.4944468924737629',
                'longitude' => '117.14783243865952',
            ]);
            Location::create([
                'name' => 'STO Palu',
                'address' => 'Jl. Ahmad Dahlan No.1 Kota Palu Kec Palu Selatan, Palu Kota, Palu',
                'latitude' => '-0.895747463573959',
                'longitude' => '119.87044165633455',
            ]);
            Location::create([
                'name' => 'STO Maumere',
                'address' => 'Jl. Soekarno Hatta no 14, disamping Kantor Telkom Maumere',
                'latitude' => '-8.627540270313055',
                'longitude' => '122.21988108592127',
            ]);
            Location::create([
                'name' => 'TTC BSD (DC)',
                'address' => 'Jl . Pahlawan Seribu Sektor Iv No.Lt. Dasar Lengkongwetan Tangerang, Lengkong Wetan, Kec. Serpong, Kota Tangerang Selatan, Banten 15322',
                'latitude' => '-6.2784853755505265',
                'longitude' => '106.66347002334876',
            ]);
            Location::create([
                'name' => 'Stasiun Bumi Indosat',
                'address' => ' Jl. Lurah Kawi, Jatiluhur PURWAKARTA 41152',
                'latitude' => '-6.52175668012265',
                'longitude' => '107.41160328902036',
            ]);
            Location::create([
                'name' => 'SKKL Ancol',
                'address' => 'Jl. Parang Tritis Raya Blok A5 No 6 Kelurahan Ancol Barat Kecamatan Pademangan Jakarta Utara 14430',
                'latitude' => '-6.12281072235971',
                'longitude' => '106.82188258865975',
            ]);
            Location::create([
                'name' => 'MSC Cempaka Indosat',
                'address' => 'JL. Bunga Cempaka No.4_ Kel. Padang Bulan _ Selayang II - Kodya Medan Sumatera Utara',
                'latitude' => '3.5518149113596045',
                'longitude' => '98.63667155471735',
            ]);
            Location::create([
                'name' => 'Indosat Gombel 2 (IM3)',
                'address' => 'Jl. Bukit Sari Raya No. 10, Sumurboto, Banyumanik, Semarang, 50269',
                'latitude' => '-7.044719640592023',
                'longitude' => '110.4233996665622',
            ]);
            Location::create([
                'name' => 'Galeri Indosat Kayoon',
                'address' => 'Jl. Kayoon No. 72 Surabaya, Surabaya 60271',
                'latitude' => '-7.271822306017752',
                'longitude' => '112.74453709343702',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Pekanbaru',
                'address' => 'Jl. Arengka 2 (JL. SM Amin), depan Pool ALS, kel.Simpang baru, Kota Pekanbaru',
                'latitude' => '0.48185909224559464',
                'longitude' => '101.39600085597364',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Medan',
                'address' => 'Jl. Pelita IV Blok D3, Kompleks Industri Medan Star Tanjung Morawa KM 20 Deli Serdang Medan, Sumut',
                'latitude' => '3.5381885349117486',
                'longitude' => '98.8137573194792',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Palembang',
                'address' => 'Palembang NDC Jl. Aspol Punti Kayu, Srijaya, Alang Alang Lebar, Kota Palembang, Sumatera Selatan',
                'latitude' => '-2.9495875636384126',
                'longitude' => '104.73077275657297',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Data Center & Cibitung',
                'address' => 'Jl. Sumbawa No.1, Mekarwangi, Kec. Cikarang Barat, Bekasi, Jawa Barat',
                'latitude' => '-6.314291346231681',
                'longitude' => '107.0905397104765',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Bandung',
                'address' => 'Jl. Soekarno Hatta No.779 Rt.02 Rw.10 Kel.Cisaranten Kulon Kec.Arcamanik Kota Bandung',
                'latitude' => '-6.937580820848149',
                'longitude' => '107.67861992980984',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Yogyakarta',
                'address' => 'Jl. Yos Sudarso No. 9, 001, Kotabaru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224',
                'latitude' => '-7.786767192151126',
                'longitude' => '110.37497065786897',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Bintaro',
                'address' => 'Bintaro Xchange Mall Lower Ground, Boulevard Bintaro Jaya Blok. O-2, Bintaro Jaya Sektor VIII, Pondok Jaya, Pondok Aren, Tangerang, Banten',
                'latitude' => '-6.272965759570755',
                'longitude' => '106.71485035599781',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Surabaya',
                'address' => 'Jl. Kali Rungkut No.15 Surabaya-Jawa Timur',
                'latitude' => '-7.318516005560207',
                'longitude' => '112.76955573932239',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Denpasar',
                'address' => 'Xl Office, Jl.Sunset Road, Kuta Badung, Kota Denpasar',
                'latitude' => '-8.714461661863936',
                'longitude' => '115.18564037154535',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Banjarmasin',
                'address' => 'Jl. Tunjung Maya No.1, Karang Mekar,Kec. Banjarmasin Kota Banjarmasin, Kalimantan Selatan 70234',
                'latitude' => '-3.330560659414196',
                'longitude' => '114.61067845929632',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Makassar',
                'address' => 'Jl. Kima 16, Kawasan Industri Makassar , Makassar, Sulawesi Selatan',
                'latitude' => '-5.097307147466827',
                'longitude' => '119.50246573962056',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Manado',
                'address' => 'Jl. Raya Paniki Atas, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara',
                'latitude' => '1.5100159714159682',
                'longitude' => '124.91450135014004',
            ]);
            Location::create([
                'name' => 'Smartfren Medan',
                'address' => 'Jl. Pulau Batam No 4, KIM2 (Kawasan Industri Medan), Mabar, Medan, Sumatera Utara',
                'latitude' => '3.6719653095002815',
                'longitude' => '98.68291813107712',
            ]);
            Location::create([
                'name' => 'Smartfren Bandung',
                'address' => 'Jl. Soekarno Hatta 546, Bandung',
                'latitude' => '-6.943564541471786',
                'longitude' => '107.64929199698962',
            ]);
            Location::create([
                'name' => 'Smartfren Jakarta',
                'address' => 'Jl. Pahlawan Seribu. CBD BSD Lot 12.A Serpong Utara, Lengkong Gudang, Tangerang, Kota Tangerang Selatan, Banten 1532',
                'latitude' => '-6.296275288401115',
                'longitude' => '106.67099798164062',
            ]);
            Location::create([
                'name' => 'Smartfren Surabaya',
                'address' => 'Jl. Pemuda 60-70 Surabaya Sinarmas Land Plaza Lantai 5, Kel. Embong Kaliasin, Kec. Genteng, Kota Surabaya, Jawa Timur 60271',
                'latitude' => '-6.1895753020385715',
                'longitude' => '106.82363736374843',
            ]);
            Location::create([
                'name' => 'Smartfren Yogyakarta',
                'address' => 'Jl. Kenari No. 62 Timoho Muja Muju Yogyakarta 55165, Jawa Tengah',
                'latitude' => '-7.799934334753907',
                'longitude' => '110.39326512768325',
            ]);
            Location::create([
                'name' => 'Smartfren Banjarmasin',
                'address' => 'Jl. A. Yani Km.4,5 No. 56 RT 16/02 Kel. Pemurus Luar Kec. Banjarmasin Timur, Kodya Banjarmasin 70249',
                'latitude' => '-3.337282278659476',
                'longitude' => '114.61764830294251',
            ]);
            Location::create([
                'name' => 'Smartfren Makasar',
                'address' => 'Jl. Urip Sumoharjo No. 168 Kel. Sindrijala Kec. Panakukkang, Kota Makassar',
                'latitude' => '-5.1376665516157285',
                'longitude' => '119.44183726813685',
            ]);
            Location::create([
                'name' => 'MSC Pekanbaru',
                'address' => 'Jl. Arengka II/Ring Road RT/RW 04/01,Kel. Simpang Baru, Kec. Tampan,Pekanbaru,Riau 28293',
                'latitude' => '0.5130432870782047',
                'longitude' => '101.42008398806414',
            ]);
            Location::create([
                'name' => 'MSC Palembang',
                'address' => 'Jl. H.Saleh/Jl Pipa RT24 RW 08 KM.7,5 Sukarame - Palembang 30153',
                'latitude' => '-2.9346411131400405',
                'longitude' => '104.71941636489383',
            ]);
            Location::create([
                'name' => 'MSC Makassar',
                'address' => 'Gedung Graha Pena, Makassar, Jl. Urip Sumoharjo No.20, Pampang, Panakkukang, Kota Makassar, Sulawesi Selatan 90231',
                'latitude' => '-5.136528567170401',
                'longitude' => '119.44165429542234',
            ]);
            Location::create([
                'name' => 'MGW Manado',
                'address' => 'Jl. Raya Pomorrow Dalam Lingkungan 5 Kelurahan Taas, Kecamatan Tikala, Kota Manado 95125',
                'latitude' => '1.46704659588544',
                'longitude' => '124.85576593625201',
            ]);
            Location::create([
                'name' => 'MGW Denpasar',
                'address' => 'Art shop Dharma Semadi, Jl. Raya Celuk, Desa Celuk, Kec. Sukawati, Kab. Gianyar. Bali 80582',
                'latitude' => '-8.60007492503952',
                'longitude' => '115.26601977184511',
            ]);
            Location::create([
                'name' => 'MSC JKT MM',
                'address' => 'Menara Mulia Basement fl, Jl. Jend Gatot Subroto Kav 9-11 Jakarta Selatan 12930',
                'latitude' => '-6.224204675516014',
                'longitude' => '106.81664358348895',
            ]);
            Location::create([
                'name' => 'MSC JKT PK',
                'address' => 'Plaza Kuningan Menara Selatan/GF, Jl. HR Rasuna Said Kav 11- 14 , Jakarta Selatan 12940',
                'latitude' => '-6.216936727307786',
                'longitude' => '106.83154825465328',
            ]);
            Location::create([
                'name' => 'MGW Medan',
                'address' => 'Jl. Beringin/Pasar Lima Gg Mestika Lorong 15, Dusun XIV Kel. Tembung Kec. Percut Sei Tuan Kab. Deli Serdang Sumatera Utara 20214',
                'latitude' => '3.586265754581034',
                'longitude' => '98.73971998636941',
            ]);
            Location::create([
                'name' => 'MGW Aceh',
                'address' => 'Dusun Peukan Banda Desa Lam Lumpu Kec. Peukan Banda Kab. Aceh Besar, Nangroe Aceh Darussalam 23351',
                'latitude' => '5.532982310561836',
                'longitude' => '95.28180215581892',
            ]);
            Location::create([
                'name' => 'MGW Lampung',
                'address' => 'JL. Raden Imba Kusuma GG. Melati LK III Kel. Sumber Rejo Kec. Kemiling, Kota Bandar Lampung 35153',
                'latitude' => '-5.405978206282463',
                'longitude' => '105.21389347680223',
            ]);
            Location::create([
                'name' => 'MSC Surabaya',
                'address' => 'Graha Pena Lt. 6, Jl. Ahmad Yani No. 88, Surabaya 60234',
                'latitude' => '-7.319956578753303',
                'longitude' => '112.73148572582895',
            ]);
            Location::create([
                'name' => 'MGW Pontianak',
                'address' => 'Jl. Wonoyoso1 RT20 RW97, Kel. Parit Tokaya Kec. Pontianak, Pontianak 78121',
                'latitude' => '-0.04770180082623032',
                'longitude' => '109.32435774014908',
            ]);
            Location::create([
                'name' => 'MSC Banjarmasin',
                'address' => 'Jl. Ahmad Yani KM 5,5 Kel. Pemurus luar Kec. Banjarmasin Timur, Kota Banjarmasin 70236',
                'latitude' => '-3.3465735800075866',
                'longitude' => '114.62300568288984',
            ]);
            Location::create([
                'name' => 'MGW Balikpapan',
                'address' => 'Jl. Patimura, Terminal Batu Ampar (sampingTelkomBatuAmpar), Balikpapan, Kalimantan Timur 76136',
                'latitude' => '-1.2179686077401277',
                'longitude' => '116.85529829121644',
            ]);
            Location::create([
                'name' => 'MGW Batam',
                'address' => 'Gedung Graha Pena, Jl. Raya Batam Centre.Teluk Tering, Nongsa, (location BSC on basement), Batam, Kepulauan Riau, 29461',
                'latitude' => '1.12602418063273',
                'longitude' => '104.05159814111246',
            ]);
            Location::create([
                'name' => 'Data Center & MSC Sentul',
                'address' => 'STO Telkom Jalan Pahlawan Desa Kadumangu, Kec Babakan Madang Sentul Bogor Jawa Barat 16810',
                'latitude' => '-6.541533797689507',
                'longitude' => '106.85364844653368',
            ]);
            Location::create([
                'name' => 'MGW Bandung',
                'address' => 'Jl. Peta (Lingkar Selatan) no.237 Kelurahan Sukaasih, Kecamatan Bojongloa Keler, Bandung 40233',
                'latitude' => '-6.933648039013942',
                'longitude' => '107.59047456133845',
            ]);
            Location::create([
                'name' => 'MGW Solo',
                'address' => 'Kampung Badran RT.02 RW.11, Kel. Mojosongo Kec. Jebres, Kab. Surakarta,Jawa Tengah 57127',
                'latitude' => '-7.440729500640949',
                'longitude' => '110.58931590016905',
            ]);
            Location::create([
                'name' => 'MGW Padang',
                'address' => 'Jl. Kampung Melayu Rt.004 RW.01, Kel. Lubuk lIntah, Kec. Kuranji, Padang, Sumatra Barat 25153',
                'latitude' => '-0.9790399618534938',
                'longitude' => '100.39733945595096',
            ]);
            Location::create([
                'name' => 'MGW Gorontalo',
                'address' => 'Jl. Raya Eyata RT/RW . 004/002 Kel. Molosifa Kec. Kota Barat Kab. Gorontalo 96134',
                'latitude' => '0.5434056964083706',
                'longitude' => '123.04202276810113',
            ]);
            Location::create([
                'name' => 'MGW Semarang',
                'address' => 'Jl. Syuhada Raya Timur RT 03/ RW02 Kelurahan Telogosari Wetan Kec. Pedurungan, Semarang Timur 50196',
                'latitude' => '-6.984750437519191',
                'longitude' => '110.4700903169905',
            ]);
            Location::create([
                'name' => 'MGW Jambi',
                'address' => 'Jl. SK. RD Syahbudin No. 47 RT. 002 Kel. Mayang Mangurai Kec. Kotabaru, Kota Jambi 36126',
                'latitude' => '-1.6376136587414876',
                'longitude' => '103.58333326420487',
            ]);
            Location::create([
                'name' => 'MGW Purwakarta',
                'address' => 'Kp. Warung Mekar RT/RW 06/03, Desa Bungursari, Kec. Bungursari, Purwakarta 41181',
                'latitude' => '-6.479900868522708',
                'longitude' => '107.47912779479327',
            ]);
            Location::create([
                'name' => 'MGW Malang',
                'address' => 'Jl. Garuda, Bendo, Karangpandan, Kec. Pakisaji, Malang, Jawa Timur 65162',
                'latitude' => '-8.071786175065066',
                'longitude' => '112.59089235945824',
            ]);
            Location::create([
                'name' => 'MGW Kotawaringin',
                'address' => 'Jl. Lingkar Kota Rt. 38 Kel. Sawahan (Mentawa Baru Hulu Utara) Kec. Mentawa Baru (Ketapang), Kotawaringin Timur 74321',
                'latitude' => '-2.533706885165943',
                'longitude' => '112.91245146949338',
            ]);
            Location::create([
                'name' => 'MGW Kendari',
                'address' => 'Jl. Buburanda, Kel. Korumba, Kec. Mandonga, Kota Kendari, Propinsi Sulawesi Tenggara 93231',
                'latitude' => '-3.9790147906150577',
                'longitude' => '122.52521594422682',
            ]);
            Location::create([
                'name' => 'MGW Bengkulu',
                'address' => 'JL. Raden Fatah no.27 RT.41 RW. 04 Kelurahan Sukarami, Kecamatan Selebar (Bengkel Teknik Bubut Depan Gerbang Perumnas Alfatindo)',
                'latitude' => '-3.8317702092385577',
                'longitude' => '102.34463590250317',
            ]);
            
            /**
            * FILKON 2
            */
            Location::create([
                'name' => 'Graha Pena',
                'address' => 'Jl. Ahmad Yani, Teluk Tering, Kec. Batam, Batam, Kepulauan Riau',
                'latitude' => '1.1259049664177034',
                'longitude' => '104.0515570518896',
            ]);
            Location::create([
                'name' => 'Gedung Lintasarta',
                'address' => 'Jl. Tahi Bonar Simatupang Raya No.16, RT.16/RW.6, Cilandak Barat, Kec. Cilandak, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.291144565238634',
                'longitude' => '106.78525113847232',
            ]);
            Location::create([
                'name' => 'Lintasarta Technopark Data Center',
                'address' => 'Komplek Pergudangan Taman Tekno Blok D No.8, BSD, Setu, Tangerang Selatan, Banten',
                'latitude' => '-6.338424061134195',
                'longitude' => '106.67656146730897',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.2385739142658885',
                'longitude' => '106.82404683847176',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 2',
                'address' => 'Jl. HR Rasuna Said X5 No.13, RT.7/RW.2, Kuningan Timur, Kec. Setiabudi, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.226172972693871',
                'longitude' => '106.83257976730768',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238595244865457',
                'longitude' => '106.82402538079968',
            ]);
            Location::create([
                'name' => 'DC iForte Tebet',
                'address' => 'Jl. Tebet Utara I No.3A, Tebet, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.225086006880421',
                'longitude' => '106.85259153847151',
            ]);
            Location::create([
                'name' => 'PT Indonesia Comnet Plus - Depok',
                'address' => 'Jl. Raya PLN EHP, Gandul, Kec. Cinere, Depok, Jawa Barat',
                'latitude' => '-6.34012634541422',
                'longitude' => '106.78719736730886',
            ]);
            Location::create([
                'name' => 'PT Indonesia Comnet Plus - Sidoarjo',
                'address' => 'Jl. Suningrat No.45 Ketegan, Sepanjang, Kec. Taman, Sidoarjo, Jawa Timur',
                'latitude' => '-7.348845059974156',
                'longitude' => '112.70722656732138',
            ]);
            Location::create([
                'name' => 'Gedung MSC Batam',
                'address' => 'Jl. Engku Putri No.15, Belian, Batam, Kepulauan Riau',
                'latitude' => '1.1266714788746666',
                'longitude' => '104.05779475581738',
            ]);
            Location::create([
                'name' => 'KPTTI Gedung Indosat Lt. 6',
                'address' => 'Jl. Medan Merdeka Barat No.21, Gambir, Jakarta Pusat, DKI Jakarta',
                'latitude' => '-6.179966363002371',
                'longitude' => '106.8214288961431',
            ]);
            Location::create([
                'name' => 'Gedung MSC Medan',
                'address' => 'Jl. Perintis Kemerdekaan No.39, Sidorame Barat I, Medan Perjuangan, Medan, Sumatera Utara',
                'latitude' => '3.5994723268107633',
                'longitude' => '98.68651419608705',
            ]);
            Location::create([
                'name' => 'Indosat SKKL Ancol',
                'address' => 'Jl. Parang Tritis Raya No. 1 FN RT.7/RW.11, Ancol, Pademangan, Jakarta Utara, DKI Jakarta',
                'latitude' => '-6.122666911695589',
                'longitude' => '106.82186383847035',
            ]);
            Location::create([
                'name' => 'Gedung MSC Surabaya',
                'address' => 'Jl. Kayon No.72, Embong Kaliasin, Genteng, Surabaya, Jawa Timur',
                'latitude' => '-7.27171981205152',
                'longitude' => '112.74453733848429',
            ]);
            Location::create([
                'name' => 'Graha JLM',
                'address' => 'Jl. Raya Mayor Oking Jaya Atmaja No.89 Cibinong, Kabupaten Bogor, Jawa Barat ',
                'latitude' => '-6.47783500745109',
                'longitude' => '106.8635669096385',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238541918364924',
                'longitude' => '106.82405756730776',
            ]);
            Location::create([
                'name' => 'PT Jala Lintas Media - Bandung',
                'address' => 'Jl. Asia Afrika No. 141-149 Kec. Sumur Bandung, Bandung, Jawa Barat',
                'latitude' => '-6.921984884200166',
                'longitude' => '107.61672126731592',
            ]);
            Location::create([
                'name' => 'PT Jala Lintas Media - Denpasar',
                'address' => 'Jl. Gatot Subroto Barat No. 333, Padangsambian Kaja, Kec. Denpasar Barat, Denpasar, Bali',
                'latitude' => '-8.636336405199652',
                'longitude' => '115.18334093850292',
            ]);
            Location::create([
                'name' => 'PT Jala Lintas Media - Medan',
                'address' => 'Jl. M. T. Haryono, Gg. Buntu, Kec. Medan Timur, Medan, Sumatera Utara',
                'latitude' => '3.587594664140079',
                'longitude' => '98.68628813207432',
            ]);
            Location::create([
                'name' => 'GD UII',
                'address' => 'Jl. Cik Di Tiro No. 1, Terban, Kec. Gondokusuman, Yogyakarta',
                'latitude' => '-7.782048176224682',
                'longitude' => '110.37458451165084',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.253330988769242',
                'longitude' => '106.83269568265197',
            ]);
            Location::create([
                'name' => 'Gedung Edge Data Center',
                'address' => 'Jl. Kuningan Barat Raya No.59, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.2391093310142',
                'longitude' => '106.82481454588',
            ]);
            Location::create([
                'name' => 'PT Jala Lintas Media - Semarang',
                'address' => 'Jl. Gajah Raya No.90D, Sambirejo, Kec. Gayamsari, Semarang, Jawa Tengah',
                'latitude' => '-6.981311055105111',
                'longitude' => '110.44913808080865',
            ]);
            Location::create([
                'name' => 'Gedung Batam Techno Park',
                'address' => 'Jl. Kolonel Sugiono, Tanjung Pinggir, Sekupang, Batam, Kepulauan Riau',
                'latitude' => '1.1678625245495051',
                'longitude' => '104.13759485376235',
            ]);
            Location::create([
                'name' => 'Gedung Edge Data Center Lantai 3',
                'address' => 'Jl. Kuningan Barat Raya No.59, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.23907153548429',
                'longitude' => '106.82475644402801',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.253330988769242',
                'longitude' => '106.83268495381596',
            ]);
            Location::create([
                'name' => 'PT Link Net Tbk - Karawaci',
                'address' => 'Gedung FM Lantai 3, Lippo Cyberpark, Jl. Boulevard Gajah Mada No.2170, Cyberpark Karawaci, Karawaci, Tangerang, Banten',
                'latitude' => '-6.219768828583634',
                'longitude' => '106.62182849628485',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238509922462001',
                'longitude' => '106.82401465196371',
            ]);
            Location::create([
                'name' => 'IDC Batam',
                'address' => 'Sumatera Cytech Building Lt. 4, Jl. Engku Putri Street Kav. 1, Batam, Kepulauan Riau',
                'latitude' => '1.1315918098277944',
                'longitude' => '104.05796682508164',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 2',
                'address' => 'Jl. HR Rasuna Said X5 No.13, RT.7/RW.2, Kuningan Timur, Kec. Setiabudi, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.226066317162177',
                'longitude' => '106.83263341148773',
            ]);
            Location::create([
                'name' => 'Gedung NIX Jatinegara',
                'address' => 'Jl. Raya Jatinegara Barat No.44, RT.1/RW.5, Kp. Melayu, Kec. Jatinegara, Jakarta Timur, DKI Jakarta',
                'latitude' => '-6.215091741361367',
                'longitude' => '106.86257036730748',
            ]);
            Location::create([
                'name' => 'Cyber CSF Building',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.237861783585874',
                'longitude' => '106.82342501320998',
            ]);
            Location::create([
                'name' => 'Graha 9',
                'address' => 'Jl. Penataran No.9, RT.10/RW.2, Pegangsaan, Kec. Menteng, Jakarta Pusat, DKI Jakarta',
                'latitude' => '-6.202814709225112',
                'longitude' => '106.84513058079925',
            ]);
            Location::create([
                'name' => 'Gedung CBD BSD',
                'address' => 'Jl. Pahlawan Seribu CBD BSD Lot 12.A Serpong Utara, Lengkong Gudang, Tangerang Selatan, Banten ',
                'latitude' => '-6.296243296010579',
                'longitude' => '106.67101943847243',
            ]);
            Location::create([
                'name' => 'Gedung NDC',
                'address' => 'Batam Techno Park, Batu Besar, Nongsa, Batam, Kepulauan Riau',
                'latitude' => '1.1686158551810777',
                'longitude' => '104.13764388203874',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.253309658770097',
                'longitude' => '106.83265276730792',
            ]);
            Location::create([
                'name' => 'Plaza Kuningan - Suite 101 Annex Building',
                'address' => 'Jl. HR Rasuna Said Kav. C11-14, Karet Kuningan, Kecamatan Setiabudi, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.216810116198717',
                'longitude' => '106.83146202716576',
            ]);
            Location::create([
                'name' => 'Cyber CSF Building',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.237750690431429',
                'longitude' => '106.82348900222728',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238552583665466',
                'longitude' => '106.82405756730776',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.25335231876752',
                'longitude' => '106.83262058079987',
            ]);
            Location::create([
                'name' => 'IDC Batam',
                'address' => 'Sumatera Cytech Building Lt. 4, Jl. Engku Putri Street Kav. 1, Batam, Kepulauan Riau',
                'latitude' => '1.1316776237742094',
                'longitude' => '104.05805265576974',
            ]);
            Location::create([
                'name' => 'Menara Tendean',
                'address' => 'Jl. Kapten Tendean No.20C, RW.3, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.2403266884965785',
                'longitude' => '106.82207732497977',
            ]);
            Location::create([
                'name' => 'PLB Pgascom',
                'address' => 'Jl. Darmapala No.20, Bukit Lama, Kec. Ilir Barat I, Palembang, Sumatera Selatan',
                'latitude' => '-2.9921897595237437',
                'longitude' => '104.72413289258837',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.253288328770074',
                'longitude' => '106.83266349614394',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238552583665466',
                'longitude' => '106.8240790249798',
            ]);
            Location::create([
                'name' => 'NDC Moratel',
                'address' => 'Jl. Citra Lautan Teduh No. 18 Tanjung Bemban, Batu Besar, Batam, Kepulauan Riau',
                'latitude' => '1.1677477886884808',
                'longitude' => '104.13757594894702',
            ]);
            Location::create([
                'name' => 'Batam, IDC',
                'address' => 'Sumatera Conv. Center Building, Jl. Engku Putri Utara No.Kav.1, Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461',
                'latitude' => '1.1310808070270892',
                'longitude' => '104.05781144470552',
            ]);
            Location::create([
                'name' => 'Gedung Cimanggis Techno Village',
                'address' => 'Jl. Riverside Golf Club No.1, Bojong Nangka, Kec. Gunung Putri, Kabupaten Bogor, Jawa Barat',
                'latitude' => '-6.434380622920525',
                'longitude' => '106.89704746923007',
            ]);
            Location::create([
                'name' => 'Ayana Midplaza',
                'address' => 'Jl. Jenderal Sudirman No 10-11, Tanah Abang, Jakarta Pusat, DKI Jakarta',
                'latitude' => '-6.208682784864143',
                'longitude' => '106.81971099614341',
            ]);
            Location::create([
                'name' => 'PT Telkom Satelit Indonesia - Bogor',
                'address' => 'Jl. Sholeh Iskandar KM 6 Cibadak, Tanah Sereal, Bogor, Jawa Barat',
                'latitude' => '-6.535821274096172',
                'longitude' => '106.77185229934548',
            ]);
            Location::create([
                'name' => 'Gedung Cyber 1',
                'address' => 'Jl. Kuningan Barat Raya No.8, Kuningan Barat, Kec. Mampang Prapatan, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.238584579565781',
                'longitude' => '106.82402538079972',
            ]);
            Location::create([
                'name' => 'Gedung IDC Duren Tiga',
                'address' => 'Jl. Duren Tiga Raya No.7, RT.9/RW.5, Duren Tiga, Kec. Pancoran, Jakarta Selatan, DKI Jakarta',
                'latitude' => '-6.253298993770193',
                'longitude' => '106.83267422497994',
            ]);
            Location::create([
                'name' => 'Komplek Ruko Megamall',
                'address' => 'Jl. Jenderal Ahmad Yani No.12, Parit Tokaya, Kec. Pontianak Selatan, Pontianak, Kalimantan Barat',
                'latitude' => '-0.052451595790809415',
                'longitude' => '109.34492277483092',
            ]);
            Location::create([
                'name' => 'Graha Transhybrid Singkawang',
                'address' => 'Jl. Tani No. 150 Pasiran Singkawang Barat, Singkawang, Kalimantan Barat',
                'latitude' => '0.9027239852749377',
                'longitude' => '108.97051453863388',
            ]);
            Location::create([
                'name' => 'Gedung PDG Cibitung',
                'address' => 'Jl. Sumbawa Blok AB No. 1, Mekarwangi, Kec. Cikarang Barat, Kabupaten Bekasi, Jawa Barat',
                'latitude' => '-6.314115791141809',
                'longitude' => '107.09037390963655',
            ]);
            Location::create([
                'name' => 'Gedung PDG Surabaya',
                'address' => 'Jl. Raya Rungkut Industri II No.15, Kali Rungkut, Rungkut, Surabaya, Jawa Timur',
                'latitude' => '-7.316011220851845',
                'longitude' => '112.76977444579333',
            ]);
            Location::create([
                'name' => 'PT XL Axiata Tbk - Tangerang Selatan',
                'address' => 'Jl. HR Rasuna Said, Pondok Jaya, Kec. Pondok Aren, Tangerang Selatan, Banten',
                'latitude' => '-6.276680488707219',
                'longitude' => '106.71867836967968',
            ]);
        $this->command->info('Successfully seeding.');
    } else {
        $this->command->info('Locations table is not empty. Skipping seeding');
    }    

    }
}
