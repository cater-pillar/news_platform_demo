-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 12:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `published_at`, `abstract`, `category_id`, `town_id`, `photo`, `body`) VALUES
(2, 'Sportski susreti, izložbe, promocija knjige u sklopu obeležavanja Dana grada Vranja', '2022-01-25 16:59:00', 'Po tradiciji, povodom obeležavanja 31. januara - Dana grada i 144. godišnjice oslobođenja Vranja od Turaka biće organizovani brojni sportski susreti koji su počeli danas turnirom u malom fudbalu, a nadmetanja u raznim sportovima će trajati do 28. januara. Osim sportskih susreta, Vranjanci će Dan grada obeležiti i izložbama, promocijom knjige, polaganjem venaca na Spomenik oslobodiocima Vranja i Svečanom akademijom. ', 1, 5, 'images/800x600_Cika-Mitke.jpg', '\r\n    <p>Sportske aktivnosti nastavljaju se u sredu turnirima u džudou i košarci, a biće održano i polufinale utakmice turnira u malom fudbalu, dok će na Besnoj kobili biti održano i takmičenje u skijanju.</p>\r\n    <p>Za četvrtak, 27. januara, planirani su turniri u stonom tenisu, odbojci i finale takmičenja u malom fudbalu, a dan kasnije će se nadmetati vranjski šahisti u prostorijama svog kluba, dok će karatisti pokaziti svoje veštine u Sportskoj hali.</p>\r\n    <p>Ulaz na svim turnirima je besplatan.</p>\r\n    <p>Nakon sportskih susreta, u petak, 28. januara, je pored prijema za pripadnike 4. brigade Kopnene vojske, planirano otvaranje izložbe “Bez prošlosti nema budućnosti” i proglašenje najboljih literarnih radova na temu “Vranje - Svedočanstvo prošlosti, putokazi budućnosti”.</p>\r\n    <p>Dan kasnije, biće priređena izložba zbirke knjiga koju je vranjska Biblioteka dobila iz privatne kolekcije Vranjanca Dragana Miniičića Cige. Reč je o 873 književna i 6 umetničkih dela.</p>\r\n    <p>U nedelju, 30. januara, planirana je promocija dvotomnog izdanja knjige “Manastir Sveti Prohor Pčinjski - analitički inventara”, a program se tradicionalno završava polaganjem cveća na spomenik “Čika Miti” 31. januara i Svečanom akademijom na kojoj će biti uručena najviša gradska priznanja zaslužnim pojedincima i kolektivima.</p>\r\n    '),
(3, 'Čišćenje snega i leda ispred kuća i lokala obavezno - u Nišu ove zime bez kazni, samo upozorenja', '2022-01-25 16:53:00', 'Ukoliko ne očiste led i sneg ispred ulaza zgrade ili lokala, građani mogu platiti kazne od 6.000 do 60. 000 dinara. U Nišu za razliku od ranijih godina ove zime niko nije kažnjen, a komunalna policija upozorila je njih dvadesetak na zakonske obaveze, odnosno da su građani, privrednici, vlasnici lokala, rukovodioci uprava i preduzeća dužni da obezbede čiste trotoare ispred svojih objekata. ', 1, 2, 'images/800x600_sneg-trotoar-foto-akostic.jpg', '\r\n    <p>U Nišu nije bilo mnogo snega, pa komunalna policija nije ni imala mnogo posla oko kažnjavanja. Ekipe na terenu izdale su 20-tak upozorenja, nakon čega su vlasnici očistili trotoare.</p>\r\n    <p>Nismo imali kažnjavanje, imali smo samo upozoravanja. Tu gde smo upozorili ljudi su očistili, tako da tu nije bilo nekih većih problema. 6.000 dinara je kazna za fizičko lice i za odgovorno lice u pravnom licu, 20. 000 za preduzetnike i 60.000 je kazna za pravno lice – kaže koordinator niške Komunalne milicije Dejan Kovačević.</p>\r\n    <p>Ni u Leskovcu nije bilo kažnjavanja, ali fotografije na terenu pokazuju da je trotoar isped Opštine neočišćen i da bi građani trebalo pažljivo da se kreću. </p>\r\n    <p>Sneg koji je pre nekoliko dana padao na teritoriji Topličkog okruga nije napravio veće probleme na gradskim ulicama u Prokuplju, ni na trotoarima za čije održavanje je zaduženo JKP Hammeum. U ovom preduzeću tvrde da su ove godine na vreme sve pripremili za zimsko održavanje ulica i trotoara u gradu, pa su odmah nakon prvog snega radnici izašli na ulice i posipali so i rizlu.</p>\r\n    <p>Nadležni podsećaju i da sneg uklanjaju tako da ne zatrpavaju slivnike, da je zabranjeno izbacivati sneg i led na ulice i druge javne površine, a u slučaju da nije moguće ukloniti ledenice sa zgrada potrebno je blagovremeno postaviti oznake upozorenja.</p>\r\n    '),
(4, 'Zaraženo više od 100 radnika niškog Kliničkog centra, zastupljeni i omikron i delta soj', '2022-01-25 15:40:00', 'I pored toga što je manji broj hospitalizovanih u kovid bolnicama, direktor Univerzitetskog kliničkog centra Zoran Perišić upozorava da nemaju svi blage kliničke slike, jer je pored omikrona zastupljen i delta soj koji ima najmanje petina pacijenata. Kaže i da je trenutno koronom zaraženo 118 zaposlenih u Kliničkom.', 1, 2, 'images/800x600_800x600-korona-testiranje-foto-vkeser.webp', '\r\n    <p>Najveći broj hospitalizovanih pacijenata u objektima Kliničkog centra, a pre svega u stacionaru Univerzitetskog kliničkog centra i na intenzivnoj nezi, jesu ljudi koji su bili povređeni, koji imaju hirurško ili internističko oboljenje i kojima je usput utvrđeno prisustvo virusa, zbog čega su u izolaciji u kovid centrima, gde ima i težih oblika kovida.</p>\r\n    <p>Na Infektivnoj klinici leže baš oni pacijenti koji imaju teže kliničke manifestacije i takvih na žalost i daje ima i ima ozbiljnijih oblika kovida. Nisu svi pacijenti ni danas sa omikronom, najmanje petina pacijenata ima delta soj koji znamo da je opasniji - kaže Perišić</p>\r\n    <p>Ipak, napominje, činjenica je da kovid bolnice imaju mnogo manji broj prijema u odnosu na prethodni period.</p>\r\n    <p>U ovom trenutku, u kurševačkoj kovid bolnici trenutno boravi oko 145 pacijenata, u stacionaru Klničkog centra je njih 36, u jedinici intenzivnog lečenja 12, na Infektivnoj klinici 41, na ginekologiji je 7 porodilja i 3 trudnice, dok je na pedijatriji četvoro pozitivne dece, a među zaraženim je i mnogo zaposlenih - kaže Perišić.</p>\r\n    <p>Objašnjava da je na današnji dan 118 obolelih radnika, ali da taj broj varira iz dana u dan. Među njima je oko 20 lekara, dok je mnogo veći broj medicinskih sestara.</p>\r\n    <p>On je istakao i da se niko od radnika nije zarazio u crvenoj zoni, već da su se inficirali na drugima mestima.</p>\r\n    '),
(5, 'Rekordan broj novozaraženih i u Jablaničkom okrugu, najveći porast zabeležen u Vlasotincu', '2022-01-25 13:49:00', 'U poslednja 24 sata u Jablaničkom okrugu je, prema podacima leskovačkog Zavoda za javno zdravlje, pozitivan nalaz na kovid dobilo 312 od testirana 703 građana, što je rekordan dnevni broj novoobolelih u tom okrugu od početka epidemije. ', 1, 6, 'images/800x600_800x600-korona-testiranje-foto-vkeser.webp', '\r\n    <p>U odnosu na dan ranije, broj novozaraženih Leskovčana je dupliran - registrovana su 172 nova slučaja, dok je najveći porast zabeležen u Vlasotincu, odakle su pozitivan nalaz dobila 82 građana, a u ponedeljak ih je bilo samo dvoje.</p>\r\n    <p>U Bojniku je na kovid pozitivno 29 osoba, u Medveđi 15, Lebanu 13 i 1 u Crnoj Travi.</p>\r\n    <p>Među novozaraženima je 184 zaposlenih, 48 nezapolenih, 54 penzionera, 20 učenika, 4 deteta i 2 studenta - saopštavaju iz Zavoda.</p>\r\n    <p>Trenutno se čeka još 21 rezultat osoba testiranih u zdravstvenim ustanovama širom Jablaničkog okruga.</p>\r\n    <p>Podsetimo, rekordan broj testiranih i novozaraženih je zabeležen i u Pčinjskom okrugu, a novi rekord po broju inficiranih postavljen je i u Nišu.</p>\r\n    '),
(6, 'Leskovčani zbog gradnje višespratnice na mestu parka pisali Vučiću, najavljuju i prijave protiv nadležnih', '2022-01-25 11:46:00', 'Stanari zgrada kod popularne ”Pepeljugine vile” u centru Leskovca više od pola godine bore se protiv izgradnje višespratnice na mestu gde se nalazi park za decu, a pošto, kako navode, iz Gradske uprave ništa ne preduzimaju, uputili su otvoreno pismo predsedniku Srbije od koga zahtevaju da se i on uključi i pomogne im u borbi. Takođe, iz novoformiranog Udruženja ”Zeleni ustanak” najavljuju i krivične prijave protiv odgovornih u Gradskoj upravi i u Direkciji za urbanizam.', 1, 1, 'images/490x370_Opsta-bolnica-Leskovac-januar-2018-foto-Bojana-Antic.jpg', '\r\n    <p>Parcela na kojoj se nalazi trenutno park, prema urbanističkom planu Odeljenja za urbanizam je predviđena kao višespratnica, a prema podacima Katastra, 2012. godine je od strane Grada Leskovca otuđena i od tada je 3 puta menjala vlasnika. Trenutni vlasnik je BM Invest grupa koja je, nakon što su stanari zgrada protestovali, podnela i krivične prijave protiv nekoliko njih.</p>\r\n    <p>Stanari su potpisivali i peticiju, gde su prikupili preko 1.000 potpisa protiv gradnje višespratnice, ali pošto se predstavnici Grada nisu dovoljno uključili u rešavanje njihovog problema, odlučili su da po drugi put upute otvoreno pismo predsedniku Vučiću, od koga očekuju da se on direktno uključi u rešavanje problema, jer je sredinom novembra i zvanično odobrena izgradnja višespratnice. </p>\r\n    <p>Ako ste nadamo se nekim slučajem pročitali naše prvo pismo koje smo Vam poslali krajem maja prošle godine zajedno sa peticijom i prvih 1.000 potpisa, onda se možda još uvek sećate da smo Vam i tada posebnu pažnju skrenuli na investitorski urbanizam koji je počeo veoma snažno da udara na javni prostor u našem gradu i koji nema milosti čak ni za parkiće i igrališta za našu decu. Molimo Vas da za razliku od prvog puta ovog puta naše pismo ne prosleđujete uopšte Gradskoj upravi Grada Leskovca obzirom da prvi put taj postupak nije dao baš nikakve konkretne rezultate. Ako je moguće, molimo Vas da se Vi ili Vaš kabinet direktno uključite i izvršite pritisak na Gradsku upravu Grada Leskovca kako bi odgovorni u istoj konačno počeli raditi svoj posao kako treba i u interesu svih građana, a ne samo investitora. Ako ipak niste u mogućnosti da tako nešto uradite, onda slobodno zanemarite i ovo naše pismo - navode stanari u otvorenom pismu Vučiću.</p>\r\n    <p>Takođe, iz Udruženja ”Zeleni ustanak” najavljuju i da će Gradskom prvobranilaštvu podneti inicijativu da se pokrene poništenje Rešenje o otuđenju zemljišta, ali najavljuju i krivične prijave protiv odgovornih.</p>\r\n    <p>Ukoliko gradski pravobranilac u nekom razumneom roku ne uradi ponovo ništa po tom pitanju planiramo da podnesemo krivične prijave i protiv njega kao i protiv odgovornih u Gradskoj upravi i u Direkciji za urbanizam i izgradnju, jer složićete se neko bi na kraju svega ovoga ipak trebao da odgovara za ogromnu štetu pričinjenu i Gradu a i svim njegovim građanima. Krivične prijave ćemo podneti Tužilaštvu za organizovani kriminal u Beogradu ili Odeljenju za suzbijanje korupcije Višeg javnog tužilaštva u Nišu obzirom da i sami verovatno znate po kom principu funkcionišu „nezavisna“ javna tužilštva po manjim gradovima uključujući i Leskovac. Pomenute prijave će biti jedna odlična prilika za sve nas da vidimo kako u praksi funkcionišu nezavisno tužilaštvo i sudstvo koje smo pre par nedelja izglazali na referendumu - navodi se u pismu.</p>\r\n    <p>Podsetimo, o problemu gradnje višespratnice umesto parka za decu raspravljalo se i na Skupštini Grada, kada je gradončelnik Leskovca Goran Cvetanović potvrdio da će višespratnica biti građena, a tom prilikom je najavio i da će svaki stanar nove zgrade imati svoje parking mesto.</p>\r\n    '),
(7, 'Uhapšen Piroćanac osumnjičen da je nožem napao sugrađanina', '2022-01-24 15:17:00', 'Zbog toga što je nožem lakše povredio 26-godišnjeg mladića, pirotska policija uhapsila je 21-godišnjeg Piroćanca. On se tereti za krivično delo laka telesna povreda za koje je zaprećena zatvorska kazna do 3 godine.', 6, 3, 'images/800x600_Policija-KOSTA.jpg', '\r\n    <p>Uhapšen je S. N. iz Pirota, a ceo događaj odigrao se u centru grada u noći između 22. i 23. januara. Do napada nožem je došlo nakon verbalne rasprave.</p>\r\n    <p>Osumnjičeni je, uz krivičnu prijavu, priveden Osnovnom javnom tužilaštvu u Pirotu, a nakon saslušanja mu je određen pritvor.</p>\r\n    '),
(8, 'Otplatom kamata kredita Grad Pirot će pomoći lokalne privrednike', '2022-01-21 10:59:00', 'Grad Pirot će i ove godine pomoći preduzetnike, mikro i mala preduzeća, otplatom kamate na kredit koji uzmu za svoje poslovanje, a kako stoji u pozivu bankama, subvencionisaće se kamate za kredite do maksimalnih 4 miliona dinara.', 4, 3, 'images/800x600_pare.jpg', '\r\n    <p>Banke imaju rok da se jave do 4. februara, a uslov je da imaju svoje filijale ili ekspoziture u Pirotu.</p>\r\n    <p>Grad će, stoji u pozivu, subvencionisati kamate isključivo na namenske dinarske kredite privredi, bez grejs perioda i sa rokom dospeća do 3 godine.</p>\r\n    <p>Nakon odabira banaka trebalo bi da se krene u izbor privrednika koji će biti podržani, a na konkurs će moći da se jave svi preduzetnicii u Pirotu, osim onih koji se bave trgovinom i poljoprivredom.</p>\r\n    <p>Privrednici će moći da podignu kredite za kupovinu ili ulaganje u poslovni prostor, za nabavku opreme i mašina, nabavku specijalizovanih alata i delova, kao i za nabavku softvera.</p>\r\n    <p>Banke mogu svoje ponude da dostave na adresu - Grad Pirot, Srpskih vladara 82, kancelarija br. 4, sa naznakom na koverti \'Subvencionisani krediti za privredu\'.</p>\r\n    '),
(9, 'Za Časni krst se plivalo i u Pirotskom okrugu - najmasovnije u Pirotu, najmanje plivača u Dimitrovgradu', '2022-01-19 15:16:00', 'Sve opštine u Pirotskom okrugu organizovale su plivanje za Časni krst, a najmasovnije je bilo u Pirotu gde je među više od 70 učesnika pobedio Saša Nikolić, mladi bokser iz Pirota.', 1, 3, 'images/800x600_casni-foto-grad-pirot.jpg', '\r\n    <p>Na Nišavi kod popularnog \'petog brzaka\' ove godine se plivalo u Pirotu na Bogojavljenje, a takmičari se nisu žalili na hladno vreme. Nikolić učestvuje svake godine, a ovo mu je prvi put da je pobedio.</p>\r\n    <p>Svake godine učestvujem, tako će i da ostane. Velika čast za mene - rekao je Nikolić.</p>\r\n    <p>On je posle Pirota, za Časni krst plivao i u Babušnici gde je na Kupališnom kompleksu učestvovalo 25 takmičara. Ipak, prvi je do krsta stigao Marjan Đorđević, takođe iz Pirota.</p>\r\n    <p>Za Ćasni krst se plivalo i u Beloj Palanci, a u kompleksu parka “Vrelo” od 15 takmičara prvi je doplivao Belopalančanin Nenad Pavlović.</p>\r\n    <p>Najmanje takmičara bilo je u Dimitrovgradu gde je nakon nekoliko odustajanja zbog virusa koronau čestvovalo 7 takmičara, a najbrži je bio Nikola Stanojev.</p>\r\n    '),
(10, 'Druga košarkaška liga: Poražene sve ekipe sa juga', '2022-01-17 19:24:00', 'Nakon jednomesečne pauze, utakmicama 13. kola nastavljena je Druga košarkaška liga Srbije, a sva četiri predstavnika juga zemlje pretrpele su poraze. Konstantin je poražen od Hercegovca (64:57), Napredak od Železničara iz Čačka (73:80), surdulički Radnik izgubio je od ekipe Borca iz Zemuna (88:98), dok su košarkaši Pirota izgubili od subotičkog Spartaka (77:109).', 7, 3, 'images/490x370_kosarka-ilustracija-foto-jv-vanja-keser-2.jpg', '\r\n    <p>Od prve četvrtine bili su u zaostatku niški košarkaši na gostovanju u Gajdobri, a i pored neizvesnog meča i završnice nisu uspeli da dođu do pobede. Najefikasniju u dresu niške ekipe bio je kapiten Mladenović sa 19 poena i 13 skokova, ali je Konstantin ostao na poslednjem mestu grupe A sa samo 2 pobede.</p>\r\n    <p>Poražena je i ekipa Napretka iz Aleksinca, iako su na poluvremenu imali 8 poena prednosti nad gostujućom ekipom iz Čačka. Bolje su košakraši Železničara zaigrali u drugom poluvremenu, pa Aleksinčanima nije pomogla ni dobra igra Matovića i Vuksanovića koji su meč završili sa po 19 poena.</p>\r\n    <p>U istoj grupi poraženi su i Surduličani, bolji od novajlija u ligi na domaćem terenu bili su gosti iz Zemuna. Saičić sa 22 poena i Škundrić sa 19 bili su najefikasniji u domaćoj ekipi, koja je ipak ostala na 7 pobeda u dosadašnjem toku prvenstva.</p>\r\n    <p>Ubedljiv poraz zabeležili su i Piroćanci na domaćem terenu od Spartaka, pa je ekipa iz Subotice preuzela prvo mesto u grupi B. Bolji od ostalih u oslabljenom timu Pirota zbog povreda, bio je Filipović koji je imao 23 poena.</p>\r\n    '),
(11, 'Gradonačelnica Sotirovski najavila tužbu zbog tvitova o personalnim asistentima', '2022-01-25 17:15:00', 'Nenavodeći protiv koga konkretno, gradonačelnica Niša Dragana Sotirovski najavila je tužbu zbog tvitova i postova na društvenim mrežama, a u kojima se navodi da personalni asistenti koji brinu o osobama sa invaliditetom neće dobiti decembarske plate. Jelena Milošević iz Stranke slobode i pravde ponašla se u ovim navodima, jer je i sama pisala o tome i kaže da ostaje pri svojoj ranijoj izjavi. ', 3, 2, 'images/1280x0_dragana-sotirovski-gradonacelnica-Nisa-otvaranje-lamele-laboratorije-ET-Nis-24-novembar-2020-foto-JV-Vanja-Keser.jpg', '\r\n    <p>Uz konstataciju da se društvene mreže zloupotrebljavaju gradonačelnica Sotirovski je rekla da će poneti još jednu tužbu protiv pojedinaca čija imena nije navodila, a koji su, kako je procenila, imali negativne tvitove.</p>\r\n    <p>Ja ću podneti još jednu tužbu protiv svih onih koji narušavaju ugled gradu i uznemiruju osobe sa invaliditetom koji imaju lične asistente i lične pratioce. Neka sve ono što navode na društvenim mrežama, neka dokazuju na sudu. Vas pozivam da mi kažete taj novac koji ćemo dobiti na sudu, kao Grad, gde želite da ga preusmerimo - rekla je Sotirovski.</p>\r\n    <p>Nije navela ni ko je i kako zloupotrebljen na društvenim mrežama, ali je rekla da su to lica sa invaliditetom i posebnim potrebama.</p>\r\n    <p>Jelena Milošević iz Stranke slobode i pravde, sa kojom je gradonačelnica već u sudskom sporu, kaže da se pronašla u ovoj izjavi i da očekuje tužbu za tvit u kome je navela da 50 personalnih asistenta, koji brinu o licima sa invaliditetom, neće dobiti platu u januaru.</p>\r\n    <p>50 porodica je niška vlast ostavila bez prihoda u januaru. Ti ljudi rade po ugovoru o delu za 31.000 dinara. I to su im uskratili ovog meseca - stoji u tvitu.</p>\r\n    <p>Milošević ističe daa i dalje stoji pri tvrdnji da oni nisu dobili platu, ali da je nakon ovog događaja dobila informaciju će im plate narednih dana ipak biti isplaćene.</p>\r\n    <p>Pravno lice nema ugled, pa ne mogu da rušim ugled Grada, a ja u tvitu nikoga nisam imenovala. Personalni asistenti nisu dobili platu, svedočiće i priložiće izvode iz banaka - kaže Milošević</p>\r\n    <p>Da je ugled grada Grada narušen rekla je pomoćnica gradonačelnice Dušica Davidović uz tvrdnju da je svim ličnim asistentima do sada redovno isplaćivana plata.</p>\r\n    <p>Ona je objasnila i da Centar za samostalni život, pružalac ove usluge, dostavlja krajem meseca satnicu koju su asistenti odradili, i da im se do 15, a najkasnije 20. narednog meseca isplaćuje zarada.</p>\r\n    <p>Centar za samostalni život je uradio satnicu svih angažovanih asistenata, oni su predali satnicu 31. januara. Prvi je bio doček Nove godine, imali smo Božić i bez obzira na praznike koje smo imali januara, na vreme je Uprava za društvene delatnosti predala taj spisak o broju sati iz decembra meseca, u kontroli je provereno i pušteno je na naplatu i oni su juče ili prekjuče već isplaćeni - kaže Davidović.</p>\r\n    <p>Davidović je istakla da je ove informacije moguće proveriti i u Centru za samostalni život, odakle nisu hteli da odgovore na pitanja novinara Južnih vesti.</p>\r\n    '),
(12, 'Narodna stranka Leskovac: Za predstojeće izbore najvažniju ulogu imaće kontrolori opozicije', '2022-01-23 10:01:00', 'Na predstojećim izborima koje očekuju građane Srbije najvažnije je da opozicija bude jedinstvena u odabiru kontrolora, jer će oni imati težak zadatak da spreče mahinacije na oko 8.200 biračkih mesta u Srbiji, poručuju iz Narodne stranke Leskovac gde je formiran i izborni štab.', 3, 1, 'images/800x600_Narodna-stranka-Leskovac-februar-2020-foto-Bojana-Stamenkovic.webp', '\r\n    <p>Navode da su kao okosnica ujedinjene opozicije formirali štab, čiji će najvažniji zadatak da bude obezbeđivanje kontrole na svakom biračkom mestu u Leskovcu i celom Jablaničkom okrugu.</p>\r\n    <p>Narodna stranka u Leskovcu sa svojim edukovanim, obučenim, doslednim i spremnim kontrolorima pokriće sva biračka mesta, braniti svaki glas građana i odbraniti izbornu volju naroda. Biračka mesta će postati svojevrsna boračka mesta gde će se voditi borba protiv režimskih mahinacija i gde će pripremljeni kontrolori iz redova dosledne opozicije braniti volju građana – navode u saopštenju.</p>\r\n    <p>Kako ističu, prošlonedeljni referendum pokazao je bez obzira na sve nepravilnosti i kršenja izbornih radnji, narod je počeo da “skida okove” u koje ih je bacio i utamničio Vučićev sistem nakaradnih vrednosti.</p>\r\n    '),
(13, 'Cvetanović: Podnosim ostavku ako firma koja radi Trg u Leskovcu rekonstruiše i Bolnicu', '2022-01-12 14:56:00', 'U 2022. godini trebalo bi da bude započeta druga faza rekonstrukcije leskovačke Bolnice vredna 4,5 milijarde dinara, a nezadovoljan odnosom firme Bauvezen prema radovima na Trgu koji kasne više od godinu dana, gradonačelnik Leskovca Goran Cvetanović najavio je da će, ukoliko ta firma dobije posao da rekonstruiše unutrašnjost Bolnice - podneti ostavku.', 3, 1, 'images/800x600_perisic-tt.webp', '\r\n    <p>Prvi čovek Leskovca danas je opet govorio o uspesima lokalne samouprave u 2021. godini, a baš kao i pre nekoliko meseci, ponovio da je najveći neuspeh vlasti nezavršen Trg, gde su radovi trebalo da budu gotovi još 2020. godine.</p>\r\n    <p>Gradonačelnik je najavio i planove koji će biti rađeni u predstojećoj godini, a jedan od kapitalnih projekata je i druga faza na rekonstrukciji Bolnice, koja podrazumeva kompletnu unutrašnju rekonstrukciju.</p>\r\n    <p>Cvetanović je istakao da su se na tenderu javile dve firme, među kojima je i Bauvezen, zbog čega je apelovao na nadležene da ne izaberu ponudu lazarevačke firme. </p>\r\n    <p>To su tako čudne firme. Oni podnesu manju cenu, a onda naprave problem. Oni sada pokušavaju da uzmu i da rekonstruišu Bolnicu. Ako oni dobiju taj posao, ja ću podneti ostavku. Nadam se da će oni koji su nadležni sagledati sve aspekte, da nije samo cena, nego i brzina i kako će to sve biti urađeno, iskreno se nadam da oni neće biti izabrani - rekao je Cvetanović.</p>\r\n    <p>Kada će konačno radovi na Trgu biti završeni Cvetanović nije mogao da precizira, ali je najavio da on očekuje da radovi budu završeni u narednih nekoliko meseci. </p>\r\n    <p>Nismo isplatili ništa što nije urađeno. Vrednost je ukupna bila 223 miliona, a isplatili smo 162. Ostaje još nekih 60 miliona. Ja sam rekao da ne verujem da će radovi biti završeni do kraja prošle godine i bio sam u pravu, jer nije bilo realno. Ne možemo da kažemo tačan datum, jer se očekuje da stigne materijal. Kada sav materijal bude stigao, onda ćemo moći nešto da preciziramo. Intezivirani su radovi poslednjih meseci, ali je sada vreme i sneg problem. Moja je procena da će radovi biti završeni kroz nekoliko meseci - kazao je Cvetanović.</p>\r\n    <p>Izbijanje pandemije virusa korona bio je jedan od razloga zašto je dat produžetak za završetak radova na Trgu, ali pošto su probijeni i ti novi rokovi, razmatralo se čak i da dođe do raskida ugovora sa firmom iz Lazarevca, s obzirom i da, kako je tada rekao Cvetanović, niko ne zna kako izgleda vlasnik Bauvezena.</p>\r\n    <p>Podsetimo, dolazilo je čak i do sukoba na relaciji radnika i gradonačelnika Leskovca, a opozicija je, uz tortu, obeležila ulazak u treću godinu radova na Trgu.</p>\r\n    ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Društvo'),
(4, 'Ekonomija'),
(6, 'Hronika'),
(2, 'Kultura'),
(3, 'Politika'),
(7, 'Sport'),
(5, 'Zabava');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `published_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `article_id`, `body`, `published_at`) VALUES
(3, 10, 11, 'Testiranje', '2022-01-28 11:58:08'),
(4, 10, 11, 'Rekao bih jos nesto cisto testa radi', '2022-01-28 12:10:01'),
(5, 10, 8, 'I ovde bih ostavio komentar', '2022-01-28 12:18:23'),
(6, 10, 8, 'Testiram', '2022-01-28 12:19:34'),
(7, 10, 8, 'Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. Pitam se sta bi se desilo ako bih napisao izuzetno dugacak komentar. ', '2022-01-28 12:20:35'),
(8, 12, 4, 'Ostavljam komentar', '2022-01-31 11:21:52'),
(9, 12, 4, 'Ostavljam jos jedan komentar', '2022-01-31 11:22:09'),
(10, 13, 7, 'I ja cu ostaviti komentar', '2022-01-31 11:24:49'),
(11, 12, 11, 'Nikad dosta komenara', '2022-01-31 12:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `name`) VALUES
(1, 'Leskovac'),
(2, 'Niš'),
(6, 'Ostali'),
(3, 'Pirot'),
(4, 'Prokuplje'),
(5, 'Vranje');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(5, 'Maja', 'maja@email.com', '$2y$10$LomTJ9d0.E2mc01g4L7g2.qmK5llt.NSz4PqToF4LO4ZA.Qziso5W'),
(6, 'Ika', 'ika@gmail.com', '$2y$10$f3GZXWNUid.t1WRgRxm5y.9jE3MownrbA5uGdnT4ppmQAE6rf8W.q'),
(7, 'Milica', 'milica@email.com', '$2y$10$rJoPanstbgpF0VKufk8w4OFhoDByBgtO26hM7IADIQpKwCzG8ZBci'),
(8, 'Laza', 'laza@email.com', '$2y$10$moBUuZzTwH.ZMAOv3DCY7uYyNLH0VvakPpuPapj2NG8CfTIj0Xbm.'),
(9, 'Bona', 'bona@email.com', '$2y$10$LDoClsu2skGWvwteso0KrOtGFIbq6eKOISiclAdqZD/UAewPCh49a'),
(10, 'Buba', 'buba@email.com', '$2y$10$INGfEYiePCbaSUlSc7n6WeDYHJbCHPvfhvoHoLurIG9MrxUhdI3uy'),
(11, 'Konstantin', 'koja@email.com', '$2y$10$9XukjIU1OmmU1huvp9/rqOVcXREWE3/wg0I1jlIJwh1QJRn91NRyS'),
(12, 'mitar', 'mitar@email.com', '$2y$10$yho.wITTLJrREAaJha6YCu.YSftJWAQPLiXthyaNYcrlwf.BNImle'),
(13, 'zorana', 'zorana@email.com', '$2y$10$Al3LBGHxdzZjhG/480KAveT/PEk1.ya6UhxC.f9sO3wahtSCD4G/m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `town_id` (`town_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`town_id`) REFERENCES `town` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
