-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Cze 2020, 14:21
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `haslo` varchar(500) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `telefon` int(20) DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  `kod_pocztowy` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `email`, `status`, `haslo`, `login`, `telefon`, `adres`, `kod_pocztowy`) VALUES
(1, 'Damian', 'Wasiak', 'damianwasiak49@gmail.com', 1, '$2y$10$K3TOdRQfynChX0nVyHIWDOdJCba0SQgU75u4yO7reKyec8BPYkfHC', 'JanuszProgramowania', NULL, NULL, NULL),
(3, 'Jan', 'Pawel', 'Watykanczyk@wp.pl', 2, '$2y$10$OpwbsP2XFXLh4S5sIIvgQ.c7TgCSa0F6d/G3ApPAX4IxdT28nguBe', 'JanPawel', 6666666, 'Watykan', 99),
(4, 'Zbigniew', 'Stonoga', 'Zbysiu@wp.pl', 2, '$2y$10$O60LrLRv9uzznOPOyZseaOmGrVLTA01VU2wuT3l9kE3Su7IF60hFO', 'Zbysiu', 12345678, 'Pruszkowsa', 99999),
(5, 'Damian', 'Wasiak', 'Mariusz@wp.pl', 2, '$2y$10$sgmextaYumPHDan1YLjLKeqsw9r00S1Kr0eQRagDZwbY8fF0eQHKe', 'Herdion994233', 734867934, 'Janinów', 99),
(8, 'Damian', 'Wasiak', 'Herdion994233@gmail.com', 2, '$2y$10$aQ7eahDUH.hHyapVa.MXO.aMGVqx/zq1/.Gl/S4dFZX2nyzpiu3.e', 'Herdion', 734867934, 'Janinów', 99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`id`, `nazwa`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `Id` int(10) NOT NULL,
  `Nazwa` varchar(200) NOT NULL,
  `Opis` varchar(200) NOT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `Zdjecie` varchar(100) NOT NULL,
  `Typ` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `towary`
--

INSERT INTO `towary` (`Id`, `Nazwa`, `Opis`, `Cena`, `Zdjecie`, `Typ`) VALUES
(1, 'Intel Core i5-9600K', 'Seria:i5-9600K</br>\r\nTaktowanie:3.7 GHz</br>\r\nLiczba rdzeni:6 rdzeni</br>\r\nCache:9 MB', '1059.00', 'Obrazy/i5.png', 'Procesor'),
(2, 'Intel Core i5-9400F', 'Seria:i5-9400F</br>\r\nTaktowanie:2.9 GHz</br>\r\nLiczba rdzeni:6 rdzeni</br>\r\nCache:9 MB', '689.00', 'Obrazy/i5.png', 'Procesor'),
(3, 'Intel Core i3-9100F', 'Seria:i3-9100F</br>\r\nTaktowanie:3.6 GHz</br>\r\nLiczba rdzeni:4 rdzenie</br>\r\nCache:6 MB', '329.00', 'Obrazy/i3.png', 'Procesor'),
(4, 'Intel Core i7-9700K', 'Seria:i7-9700K</br>\r\nTaktowanie:3.6 GHz</br>\r\nLiczba rdzeni:8 rdzeni</br>\r\nCache:12 MB', '1829.00', 'Obrazy/i7.png', 'Procesor'),
(5, 'Intel Core i7-7700', 'Seria:i7-7700\r\nTaktowanie:3.6 GHz<br>\r\nLiczba rdzeni:4 rdzenie\r\nCache:8 MB', '1499.00', 'Obrazy/i7.png', 'Procesor'),
(6, 'MSI GeForce RTX 2060 GAMING Z 6GB GDDR6', 'Układ:GeForce RTX 2060</br>\r\nPamięć:6 GB</br>\r\nRodzaj pamięci:GDDR6</br>\r\nZłącza: HDMI - 1 szt.</br>\r\nDisplayPort - 3 szt.', '1599.00', 'Obrazy/Rtx2060.png', 'KartaGraficzna'),
(7, 'ASUS Radeon RX 580 Dual OC 8GB GDDR5', 'Układ:Radeon RX 580</br>\r\nPamięć:8 GB</br>\r\nRodzaj pamięci:GDDR5</br>\r\nZłącza:HDMI - 2 szt., DVI - 1 szt.</br>\r\nDisplayPort - 2 szt.', '819.00', 'Obrazy/Rx580.png', 'KartaGraficzna'),
(8, 'MSI GeForce GTX 1050 TI GAMING X 4GB GDDR5', 'Układ:GeForce GTX 1050 Ti</br>\r\nPamięć:4 GB</br>\r\nRodzaj pamięci:GDDR5</br>\r\nZłącza:HDMI - 1 szt., DVI - 1 szt.</br>\r\n DisplayPort - 1 szt.', '669.00', 'Obrazy/Gtx1050ti.png', 'KartaGraficzna'),
(9, 'SilentiumPC Signum SG1 TG', 'Typ:Middle Tower</br>\r\nStandard płyty:ATX, m-ATX, Mini-ITX</br>\r\nKarty rozszerzeń:7</br>\r\nMaks. długość grafiki:325 mm', '229.00', 'Obrazy/Obudowa1.png', 'Obudowa'),
(10, 'be quiet! Pure Base 500 Window Black', 'Typ:Middle Tower</br>\r\nStandard płyty:ATX, m-ATX, Mini-ITX</br>\r\nKarty rozszerzeń:7</br>\r\nMaks. długość grafiki:369 mm', '339.00', 'Obrazy/Obudowa2.png', 'Obudowa'),
(11, 'iBOX Orcus X19', 'Typ:Middle Tower\r\nStandard płyty:ATX, microATX, ITX\r\nKarty rozszerzeń:7\r\nMaks. długość grafiki:360 mm', '139.00', 'Obrazy/Obudowa3.png', 'Obudowa'),
(12, 'Acer Nitro VG240YBMIIX czarny', 'Przekątna:23,8\"<br>\r\nRozdzielczość:1920 x 1080<br>\r\nMatryca:LED, IPS <br>\r\nTyp ekranu:Płaski <br>', '569.00', 'Obrazy/Monitor1.png', 'Monitor'),
(13, 'iiyama G-Master G2530HSU Black Hawk', 'Przekątna:24,5\"<br>\r\nRozdzielczość:1920 x 1080<br>\r\nMatryca:LED, TN<br>\r\nTyp ekranu:Płaski', '599.00', 'Obrazy/Monitor2.png', 'Monitor'),
(14, 'Myszka SteelSeries Rival 105', 'Typ myszy:Dla graczy\r\nSensor:Optyczny<br>\r\nLiczba przycisków:6<br>\r\nRozdzielczość:4000 dpi', '99.00', 'Obrazy/Akcesoria1.png', 'Akcesoria'),
(15, 'AMD Ryzen 7 3800X', 'Seria:Ryzen 7 3800X<br>\r\nTaktowanie:3.9 GHz<br>\r\nLiczba rdzeni:8 rdzeni<br>\r\nCache:36 MB', '1529.00', 'Obrazy/Procesor1.png', 'Procesor'),
(16, 'AMD Ryzen 3 3200G', 'Seria:Ryzen 3 3200G<br>\r\nTaktowanie:3.6 GHz<br>\r\nLiczba rdzeni:4 rdzenie<br>\r\nCache:6 MB', '439.00', 'Obrazy/Procesor2.png', 'Procesor'),
(17, 'Razer Kraken Essential', 'Konstrukcja słuchawek:Nauszne półotwarte<br>\r\nPasmo przenoszenia:20 ~ 20000 Hz<br>\r\nMikrofon:Tak<br>\r\nŁączność:Przewodowa', '159.00', 'Obrazy/Sluchawki1.png', 'Akcesoria'),
(18, 'Mikrofon Trust GXT258 Fyru (USB)', 'Łączność:Przewodowa <br>\r\nZłącze:USB - 1 szt. <br>\r\nTyp mikrofonu:Dwukierunkowy, Wielokierunkowy, Kardioidalny', '489.00', 'Obrazy/Mikrofon1.png', 'Akcesoria'),
(19, 'Razer Ornata Chroma', 'Przeznaczenie:Gaming<br>\r\nŁączność:Przewodowa<br>\r\nPodświetlenie:Wielokolorowe<br>\r\nKolor:Czarny', '329.00', 'Obrazy/Klawiatura1.png', 'Akcesoria'),
(20, 'MSI Geforce RTX 2070 SUPER GAMING X', 'Układ:GeForce RTX 2070 SUPER<br>\r\nPamięć:8 GB<br>\r\nRodzaj pamięci:GDDR6<br>\r\nZłącza:HDMI - 1 szt., DisplayPort - 3 szt.', '2799.00', 'Obrazy/Kartagraficzna4.png', 'KartaGraficzna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `ID` int(11) NOT NULL,
  `Login` text NOT NULL,
  `Haslo` text NOT NULL,
  `Email` text NOT NULL,
  `test` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `użytkownicy`
--

INSERT INTO `użytkownicy` (`ID`, `Login`, `Haslo`, `Email`, `test`) VALUES
(1, 'Login', 'Haslo', 'Email.com', '100'),
(2, 'Login3', 'Haslo', 'Email3', '10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `Id` int(10) NOT NULL,
  `klient` int(10) NOT NULL,
  `data` date NOT NULL,
  `wartosc` decimal(10,2) NOT NULL,
  `id_towaru` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`Id`, `klient`, `data`, `wartosc`, `id_towaru`) VALUES
(11, 8, '2020-06-05', '669.00', 9),
(12, 8, '2020-06-05', '669.00', 1),
(13, 8, '2020-06-05', '229.00', 9),
(14, 8, '2020-06-05', '1059.00', 1),
(15, 8, '2020-06-05', '229.00', 9),
(16, 8, '2020-06-05', '1059.00', 1),
(17, 8, '2020-06-05', '229.00', 9),
(18, 8, '2020-06-05', '1059.00', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `towary`
--
ALTER TABLE `towary`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
