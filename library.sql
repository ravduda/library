-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_library
-- Generation Time: Cze 30, 2023 at 05:44 AM
-- Wersja serwera: 8.0.33
-- Wersja PHP: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`) VALUES
(3, 'Adam', 'Mickiewicz'),
(4, 'Bolesław', 'Prus'),
(5, 'Henryk', 'Sienkiewicz'),
(6, 'Johann', 'Wolfgang von Goethe'),
(7, 'Dante', 'Alighieri'),
(8, 'William', 'Shakespeare'),
(9, 'Mark', 'Twain'),
(10, 'Stanisław', 'Wyspiański'),
(11, 'Stefan', 'Żeromski'),
(12, 'Aleksander', 'Fredro'),
(13, 'Daniel', 'Defoe'),
(14, 'Juliusz', 'Słowacki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `titleId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrow`
--

CREATE TABLE `borrow` (
  `id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `bookId` int DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `returned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Epika'),
(4, 'Liryka'),
(5, 'Dramat');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `title`
--

CREATE TABLE `title` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `description` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `authorId` int DEFAULT NULL,
  `categoryId` int DEFAULT NULL,
  `img` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`, `description`, `authorId`, `categoryId`, `img`) VALUES
(17, 'Pan Tadeusz, czyli ostatni zajazd na Litwie', 'Pan Tadeusz Adama Mickiewicza stanowi spisaną trzynastozgłoskowcem (a więc stylem podniosłym), zawartą w dwunastu księgach epicką opowieść o szlachcie polskiej początku XIX wieku. Jako epopeja narodowa, która miała „trafić pod strzechy”, czyli do wszystkich Polaków, również tych niezaliczających się do elit majątkowych, urzędniczych czy umysłowych — jest prawdopodobnie najsłynniejszym dziełem czołowego polskiego poety romantycznego.', 3, 1, '/covers/pan-tadeusz_UKtrQvp.jpg'),
(18, 'Lalka', 'Lalka to najsłynniejsza powieść Bolesława Prusa, pierwotnie ukazywała się na łamach „Kuriera Codziennego”, po raz pierwszy została wydana w 1890 roku.  Głównym bohaterem powieści jest Stanisław Wokulski, bogaty warszawski kupiec, filantrop, nieszczęśliwie zakochany w arystokratce, Izabeli Łęckiej. Choć wątek Wokulskiego wydaje się wysuwać na pierwszy plan, w Lalce niezwykle ważny jest również Pamiętnik starego subiekta, pisany przez Ignacego Rzeckiego, w którym wspomina czasy sięgające Wiosny Ludów, a także komentuje wydarzenia współczesne. W powieści zapisany zostaje również bezcenny obraz XIX-wiecznej Warszawy: zarówno realia społeczne — relacje warstw społecznych — jak i topograficzne.', 4, 1, '/covers/lalka_Rsw56ct.jpg'),
(19, 'W pustyni i w puszczy', 'Najsłynniejsza powieść przygodowa Henryka Sienkiewicza skierowana do młodzieży. Czternastoletni Staś Tarkowski i ośmioletnia Nel Rawlinson zostają uprowadzeni przez beduinów.  Mężczyźni prowadzą ich przez pustynię do Smaina, sudańskiego dozorcy, którego rodzina została wzięta w niewolę przez Anglików. W drodze przeżywają różne przygody, dzieci muszą się mierzyć z nieznanym klimatem oraz zwyczajami, a także okrucieństwem ze strony porywaczy. Kiedy docierają na miejsce, okazuje się, że Sudańczyka nie ma w mieście, konieczna jest zatem dalsza podróż…', 5, 1, '/covers/w-pustyni-i-w-puszczy_T5A2UIi.jpg'),
(20, 'Quo vadis', 'Akcja powieści Quo Vadis ma miejsce w pierwszym wieku w Rzymie, za czasów panowania Nerona.  Marek Winicjusz, patrycjusz rzymski, poznaje Ligię, brankę wychowaną w domu Plaucjuszów, chrześcijankę. Kobieta nie chce zostać jego kochanką, więc Winicjusz podejmuje walkę, próbuje porwać Ligię z domu dla ubogich chrześcijan. Kiedy zostaje ranny, chrześcijanie troszczą się o niego i leczą, pomaga mu również Ligia. Daje to wiele do myślenia Winicjuszowi-poganinowi. Antagonizm między światem chrześcijańskim a pogańskim wpływa też na coraz bardziej bezwzględne decyzje Nerona…', 5, 1, '/covers/quo-vadis_xLfMms4.jpg'),
(21, 'Cierpienia młodego Wertera', 'Cierpienia młodego Wertera autorstwa Johanna Wolfganga Goethego to jedno z najsłynniejszych dzieł preromantyzmu i okresu Sturm und Drang.  To powieść epistolarna, czyli napisana w formie serii listów, której głównym bohaterem jest Werter, nieszczęśliwie zakochany w Lotcie. Ukochana mężczyzny jest mężatką, jednak nie potrafi on zrezygnować z miłości wobec kobiety i ciągle utrzymuje z nią kontakt, a nawet zaprzyjaźnia się z jej mężem. Wewnętrzne rozterki ukazują jednak, w jak trudnej sytuacji znajduje się Werter i jak bardzo cierpi z powodu niespełnionej miłości.', 6, 1, '/covers/cierpienia-mlodego-wertera_AXcDuq4.jpg'),
(22, 'Boska Komedia', 'Boska Komedia to dzieło życia włoskiego poety Dante Alighieriego, którym chciał zapewnić nieśmiertelność, oddać hołd swojej zmarłej ukochanej Beatrycze oraz ostrzec lud średniowieczny przed konsekwencjami grzesznego życia.  Poemat tryptyk — składający się z trzech ksiąg — Piekła, Czyśćca i Raju, po których wędruje alter ego autora, oprowadzane przez Wergiliusza, św. Bernarda z Clairvaux oraz ukochaną Beatrycze. Alighieri nie tylko jako bohater, ale i jako narrator krytykuje zaświaty, będące alegorią życia doczesnego. W całym utworze wyraźnie widać fascynację cyframi, zwłaszcza 3, będącą symbolem Trójcy Świętej. Księga pierwsza, Piekło, charakteryzuje się drastycznymi opisami wydarzeń i właśnie dzięki niej mówi się o dantejskich scenach.', 7, 4, '/covers/boska-komedia_Um04NP3.jpg'),
(23, 'Romeo i Julia', 'Romeo i Julia to dramat Wiliama Szekspira wydany w 1597 roku. Źródeł dzieła można doszukiwać się w dwóch utworach Le tre parti de le Novelle del Bandello oraz Palace of Pleasure.  Matka Julii Kapulet postanawia wydać córkę za Parysa (jest to krewny księcia Werony). Organizuje ona bal, na którym młodzi mają się zapoznać. Zjawia się tam też potomek zwaśnionego z nimi rodu Monteki, Romeo. Romeo i Julia zakochują się w sobie „od pierwszego wejrzenia”. Wkrótce w tajemnicy biorą ze sobą ślub. Jednak los bywa okrutny….', 8, 5, '/covers/romeo-i-julia_7JJOcuL.jpg'),
(24, 'Przygody Tomka Sawyera', 'Przygody Tomka Sawyera to najsłynniejsza powieść dla młodzieży autorstwa amerykańskiego pisarza Marka Twaina.  Tomek Sawyer żyje w St. Petersburgu nad rzeką Missisipi z ciotką i przyrodnim bratem. Nie jest grzecznym i spokojnym chłopcem — to zdecydowanie mały urwis. Mark Twain wprowadza czytelnika w dziecięcy świat przygód, pełen zabawy i fantazji. Jest to także spotkanie z pierwszymi prawdziwymi problemami — jak pierwsza miłość, niesprawiedliwość czy przyjaźń wystawiona na próbę.', 9, 1, '/covers/przygody-tomka-sawyera_AObDO3e.jpg'),
(25, 'Wesele', 'Wystawiony po raz pierwszy na krakowskiej scenie w 1901 r. dramat Stanisława Wyspiańskiego Wesele wywołał spore poruszenie, niemal skandal. Głównym powodem był fakt wprowadzenia na scenę autentycznych, rozpoznawalnych w środowisku postaci pod ich własnymi imionami oraz odwołanie do rzeczywistego wydarzenia, mianowicie wesela poety Lucjana Rydla z chłopką Jadwigą Mikołajczykówną, które miało miejsce zaledwie rok wcześniej.', 10, 5, '/covers/wesele_ZF1ly0H.jpg'),
(26, 'Hamlet', '„Być albo nie być” — jedno z najsławniejszych pytań w historii literatury, patronujące rozdarciu cechującemu postawę hamletyczną.  Na zamku Elsynor w Danii w niewyjaśnionych okolicznościach ginie król, Hamlet senior. Władzę przejmuje jego brat, Klaudiusz, który żeni się z królową-wdową. Kiedy do kraju wraca syn i zarazem imiennik zmarłego króla, ukazuje mu się duch ojca. Wyjawia mu, kto go zabił, oraz dopomina się, by syn pomścił zbrodnię. Przed Hamletem stoi trudny wybór: czy pomścić swojego ojca czy żyć, jakby nic się nie stało?', 8, 5, '/covers/hamlet_54M0WPz.jpg'),
(27, 'Przedwiośnie', 'Powieść Stefana Żeromskiego Przedwiośnie została wydana w 1924 roku. Opisuje losy Cezarego Baryki, wychowanego w Imperium Rosyjskim, w Baku, który jako młodzieniec przybywa do Polski, ojczyzny zmarłych rodziców.  W Przedwiośniu opisany zostaje proces dojrzewania Cezarego Baryki — zarówno wewnętrznej i zewnętrznej przemiany z chłopca w młodego mężczyznę, jak i podjęcia ważnych decyzji — wyboru studiów i drogi życiowej, a także postawy ideologicznej wobec zachodzących zmian politycznych. Z powieści wyłania się także polityczny i społeczny obraz Polski, która dopiero co odzyskała niepodległość — zamiast tak wspaniale opisywanego przez ojca kraju Cezary przyjeżdża do miejsca, w którym panuje chaos i nędza.', 11, 1, '/covers/przedwiosnie_h2eBg34.jpg'),
(28, 'Zemsta', 'Zemsta to komedia Aleksandra Fredry, po raz pierwszy wystawiona w teatrze w roku 1834, a cztery lata później wydana w formie książkowej. Od tego czasu cieszy się popularnością i bawi widzów, ponieważ z humorem ukazuje charakterystyczne dla kultury i obyczajowości polskiej wątki.  Historia oparta jest na autentycznych wydarzeniach, których opis autor znalazł w dokumentach rodowych swojej żony i które rozegrały się na zamku Kamieniec w Odrzykoniu.', 12, 5, '/covers/zemsta_S4ynbJh.jpg'),
(29, 'Robinson Crusoe', 'Robinson Crusoe to powieść podróżniczo-przygodowa, najsłynniejsza w dorobku autora, Daniela Defoe.  Opowiada ona historię młodego mężczyzny, który ucieka z domu, bo nie chce wieść nudnego żywota, takiego, jakie wiedzie jego ojciec. Trafia na statek i uczy się sztuki żeglarskiej, prowadzi interesy wraz z żoną zmarłego kapitana, dużo podróżuje, aż podczas jednej z wypraw statek zostaje napadnięty, a załoga uwięziona. Crusoe jednak nie zamierza dokonać żywota w mauretańskiej niewoli.', 13, 1, '/covers/robinson-crusoe_Wo1z2lK.jpg'),
(30, 'Kordian', 'Kordian to dramat Juliusza Słowackiego wydany anonimowo w 1834 roku w Paryżu.  Tytułowy bohater zastanawia się nad sensem egzystencji, przeżywa ból świata, istnienia, aż w końcu dochodzi do nieudanej próby samobójczej. Następnie Kordian udaje się w podróż, podczas której odwiedza m.in. górę Mont Blanc, gdzie podejmuje decyzję, by walczyć o niepodległość kraju. Po powrocie do Polski przygotowuje się do zamachu na cara Mikołaja I…', 14, 1, '/covers/kordian_czO8H33.jpg'),
(31, 'Dziady', 'Dziady to cykl czterech dramatów polskiego poety Adama Mickiewicza wydanych w latach 1822–1860. Oprócz pisania Mickiewicz angażował się w działania polityczne, religijne, także był dowódcą wojskowym, tłumaczem i filozofem.  Zaliczany jest do grona trzech wieszczów (obok Juliusza Słowackiego i Zygmunta Krasińskiego).  III część Dziadów napisana została z powodu wyrzutów sumienia autora, ponieważ nie wziął on udziału w powstaniu listopadowym. Ostatnia z części (według numeracji część I) nie została ukończona i została wydana pośmiertnie.', 3, 5, '/covers/dziady_AEB8Cx1.jpg'),
(32, 'Potop', 'Potop to druga część pisanej ku pokrzepieniu serc Trylogii Henryka Sienkiewicza.  Autor przenosi czytelnika w lata 1655–1657, pierwsze dwa lata potopu szwedzkiego. Główny bohater to Andrzej Kmicic, młody chorąży, warchoł i hulaka. Ma poślubić — zgodnie z testamentem jej dziadka — Aleksandrę Billewiczównę. Dziewczynie nie podoba się charakter narzeczonego oraz fakt, że Kmicic opowiada się za Radziwiłłami, popierającymi Szwedów. Pod zmienionym nazwiskiem próbuje zrehabilitować się w walce. Sienkiewicz znów usiłuje ukazać Polakom waleczność ich przodków, przypomnieć momenty w historii, które powinny pobudzać do patriotyzmu i niepoddawania się zaborcom. Fakty historyczne przeplatają się z fabularną fikcją, a postaci rzeczywiste z nierzeczywistymi.', 5, 1, '/covers/potop_4v79maj.jpg'),
(33, 'Latarnik', 'Nowela Henryka Sienkiewicza, która po raz pierwszy ukazała się w 1881 roku. Opowiada historię Skawińskiego, Polaka, który przybywa do panamskiego miasta Aspinwall, by objąć posadę latarnika.  Starzec, zmęczony bardzo intensywnym życiem, który wiele lat tułał się po świecie, podejmował się różnych zawodów, walczył w wojnach i powstaniach, poszukuje miejsca, w którym mógłby wreszcie odpocząć i powspominać ukochaną ojczyznę, do której nie może wrócić (przez udział w powstaniu listopadowym przed laty).  Sienkiewicz napisał Latarnika podczas swojej kilkuletniej wyprawy do Stanów Zjednoczonych, a historia oparta jest na losach autentycznej postaci.', 5, 1, '/covers/latarnik_z0bMJMA.jpg'),
(34, 'Makbet', 'Makbet to tragedia Wiliama Shakespeare&#39;a, która powstała ok. 1606 roku i jest jedną z najczęściej wystawianych w teatrze sztuk dramaturga. Utwór został oparty na przekazach historycznych jednej z kronik.  Makbet wraz z przyjacielem, Bankiem, są dowódcami wojsk Dunkana, króla Szkocji. Gdy wracają z jednej z bitew, ukazują im się wiedźmy, które przepowiadają, że Makbet będzie królem. Początkowo nie chce w to uwierzyć, jednak przepowiednia zaczyna się spełniać — wkrótce zostaje tanem Kawdoru. Wtedy to zaczyna myśleć o objęciu władzy. Za namową żony zabija Dunkana, który przybył na jego dwór i zostaje królem. Jednak aby zatuszować ślady, zaczyna popełniać kolejne zbrodnie…', 8, 5, '/covers/makbet_HgNO0aV.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `firstname`, `lastname`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user', 'user', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titleId` (`titleId`);

--
-- Indeksy dla tabeli `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`titleId`) REFERENCES `title` (`id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `title_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `title_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
