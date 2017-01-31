-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sty 2017, 16:43
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kalkulator_zywieniowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `a_login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `a_haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jednostki`
--

CREATE TABLE `jednostki` (
  `id_jedno` int(5) NOT NULL,
  `nazwa_jedno` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `skrot_jedno` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Zrzut danych tabeli `jednostki`
--

INSERT INTO `jednostki` (`id_jedno`, `nazwa_jedno`, `skrot_jedno`) VALUES
(1, 'sdad', 'sda'),
(2, 'dddd', 'd'),
(3, 'sad', 'sdas');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kateg` int(5) NOT NULL,
  `nazwa_kateg` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kateg`, `nazwa_kateg`) VALUES
(5, 'pieczywo'),
(6, 'owoce'),
(7, 'warzywa'),
(8, 'mięso i wedliny '),
(9, 'makarony ryz kasza'),
(10, 'mleko, sery');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry`
--

CREATE TABLE `parametry` (
  `id_param` int(5) NOT NULL,
  `nazwa_param` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nazwa_jedno` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `skrot_jedno` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry`
--

INSERT INTO `parametry` (`id_param`, `nazwa_param`, `nazwa_jedno`, `skrot_jedno`) VALUES
(4, 'Białko', 'gram', 'g'),
(5, 'Węglowodany', 'gram', 'g'),
(6, 'Tłuszcz', 'gram', 'g');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podkategorie`
--

CREATE TABLE `podkategorie` (
  `id_podkateg` int(5) NOT NULL,
  `nazwa_podkateg` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `id_kateg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `podkategorie`
--

INSERT INTO `podkategorie` (`id_podkateg`, `nazwa_podkateg`, `id_kateg`) VALUES
(2, 'chleby', 5),
(4, 'makaron', 9),
(5, 'bułki ', 5),
(6, 'owoce lokalne', 6),
(7, 'owoce egozotyczne', 6),
(8, 'wolowina', 8),
(9, 'drób ', 8),
(10, 'twarog', 10),
(11, 'ser żółty', 10),
(12, 'mleko', 10),
(13, 'ryż', 5),
(14, 'warzywa strączkowe ', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id_prod` int(5) NOT NULL,
  `nazwa_prod` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `opis_prod` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `id_podkateg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`id_prod`, `nazwa_prod`, `opis_prod`, `id_podkateg`) VALUES
(1, 'Ryż biały', 'Ryż biały', 13),
(2, 'jabłko', 'polskie jablko ', 6),
(3, 'pomarańcz', 'hiszpańskie pomarańcze ', 7),
(4, 'pierś z kurczaka ', 'pierś z kurczaka ', 9),
(5, 'chleb biały', 'pyszny biały chlebek z mąki pszennej', 2),
(6, 'makaron razowy', 'makaron z maki razowej', 4),
(7, 'fasola szparagowa', 'fasola szparagowa', 14),
(8, 'mleko 3,2%', 'mleko laciate 3,2% ', 12),
(9, 'ser gouda', 'ser gouda mlekpol', 11),
(10, 'bułka kukurydziana', 'bułka kukurydziana piekarnia Społem', 5),
(11, 'wołowina mielona', 'wołowina mielona 5% tluszczu', 8),
(12, 'mandarynki ', 'mandarynki z Hiszpanii ', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt_param`
--

CREATE TABLE `produkt_param` (
  `id_prod_param` int(5) NOT NULL,
  `id_prod` int(5) NOT NULL,
  `id_param` int(5) NOT NULL,
  `wartosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkt_param`
--

INSERT INTO `produkt_param` (`id_prod_param`, `id_prod`, `id_param`, `wartosc`) VALUES
(7, 1, 4, 8),
(8, 1, 5, 79),
(10, 1, 6, 4),
(12, 6, 4, 5),
(13, 6, 5, 50),
(14, 6, 6, 1),
(15, 5, 4, 8),
(16, 5, 5, 60),
(17, 5, 6, 2),
(18, 2, 4, 1),
(19, 2, 5, 11),
(20, 2, 6, 0),
(21, 3, 4, 1),
(22, 3, 5, 10),
(23, 3, 6, 0),
(24, 4, 4, 34),
(25, 4, 5, 0),
(26, 4, 6, 2),
(27, 7, 4, 10),
(28, 7, 5, 7),
(29, 7, 6, 0),
(30, 8, 4, 11),
(31, 8, 5, 10),
(32, 8, 6, 3),
(33, 9, 4, 17),
(34, 9, 5, 3),
(35, 9, 6, 16),
(36, 10, 4, 8),
(37, 10, 5, 55),
(38, 10, 6, 1),
(39, 11, 4, 20),
(40, 11, 5, 0),
(41, 11, 6, 5),
(42, 12, 4, 2),
(43, 12, 5, 11),
(44, 12, 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytk` int(5) NOT NULL,
  `login` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `wiek` int(3) NOT NULL,
  `wzorst` int(3) NOT NULL,
  `waga` int(4) NOT NULL,
  `plec` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `zap_kalorie` int(5) NOT NULL,
  `zap_bialko` int(3) NOT NULL,
  `zap_wegle` int(4) NOT NULL,
  `zap_tluszcz` int(3) NOT NULL,
  `rola` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `zap_wzor` int(1) NOT NULL,
  `zap_aktywnosc` int(11) NOT NULL,
  `zap_modyfikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytk`, `login`, `haslo`, `email`, `wiek`, `wzorst`, `waga`, `plec`, `zap_kalorie`, `zap_bialko`, `zap_wegle`, `zap_tluszcz`, `rola`, `zap_wzor`, `zap_aktywnosc`, `zap_modyfikator`) VALUES
(1, 'asd', '$2y$10$tB4nPN7qJkX5tM7OAWarauVte/5AVoXhL2EM7Jaf74fxSi/kbPq/.', 'asd@wp.pl', 11, 10, 11, 'Mężczyzna', 11, 11, 11, 11, 'user', 0, 0, 0),
(2, 'asdasd', '$2y$10$lzDZjCyNvMT8EJ67a9jBBOw8EirVCofKjrflwQJPubJ', '2313231323asd@wp.pl', 11, 9, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(3, 'qwe123', '$2y$10$OOREFGL7R1xiGNGpH8SbtOyNbXTqhAM1YLK0osuCgKj', 'sdaddadadasasd@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(4, 'qwe1234', '$2y$10$AUAggzNMGtRQ7YL7BdUCROEHfLmne93mMR7Qe6..OOR', 'qwe1234@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(6, 'asd123321', '$2y$10$LLXpvVyLOi5f./jOSoyDp.Jj4CBpYCxGptDGh52T0FaSvmHyFUWU.', 'asd123321@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(7, 'adsdasdada', '$2y$10$blNdmkDpy5JFconVeJWw7eQ3wBASBJI67uK3QHnFc9ebOeKmR64ta', 'sadsdasad@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(8, 'admin', '$2y$10$h5l3wNyFShGvodxIE7FrqOm01Jxb4/nf61jrfQBGTvFR9bXtafpPi', 'admin123@wp.plsdasda', 99, 123, 80, 'Kobieta', 2500, 209, 209, 92, 'admin', 1, 2, 10),
(9, 'zxczzxcczx', '$2y$10$p7gKLllW2qeWQq1XBPPPP.cIG8WG7rLmXxY2z8/7L1gEdyMHzrOZ2', 'asdaddasdsasad@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(10, 'zxcvvvbbb', '$2y$10$r1ijob8/e0fwy2FoYaHwnuqSltelczZ9cMLgwn9m807Qr5QDQmcm.', 'a231231231231d@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, '', 0, 0, 0),
(11, 'sdad213123', '$2y$10$oiYuzDGt06m8LCHS80IfNOXgeeHRV3tkEsT0BlZbMQF8yPSrb7p1m', 'a23131331sd@wp.pl', 11, 11, 11, '11', 11, 11, 11, 11, 'admin', 0, 0, 0),
(12, 'sadd', '$2y$10$6McUKTvoZLtx9qiVjnN4v.jTBjE.7Kz7Kyo3yg4tRxv3IfJr6DciO', 'as2323123313d@wp.pl', 11, 11, 11, 'Mężczyzna', 4000, 200, 0, 100, 'user', 0, 0, 0),
(13, 'sad123231', '$2y$10$YwnIc7ohgRWDeQUzBy5snOQf02vQhLB2GmgbrNCYLMYbc7OZiYTva', '123adsasxzc@wp.pl', 11, 11, 11, 'Mężczyzna', 0, 0, 0, 0, 'user', 0, 0, 0),
(14, 'sdadsa2131', '$2y$10$hfuOHjR5judjxGmfdRWixu8sCLi2PEcM66iZMEGjH7f1GYuMXNTXe', '2222asd@wp.pl', 11, 11, 11, 'Mężczyzna', 0, 0, 0, 0, 'user', 0, 0, 0),
(15, 'los1234', '$2y$10$yZcAc1HhIzC82jAi0RHPJelJ5dBChKZ8YMQGnqpf6g7AMDhnJ/Kzi', 'sasasa@o2.pl', 21, 200, 100, 'Mężczyzna', 0, 0, 0, 0, 'user', 0, 0, 0),
(16, 'los12345', '$2y$10$Z40oKOn7cHygNd3tM9QEzeFiRh7SBFs9jkJRKmQ55MhN0T9ZnWsX2', 'arafefgrim@gmail.com', 21, 170, 75, 'Mężczyzna', 3414, 285, 285, 126, 'user', 1, 4, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytk_prod`
--

CREATE TABLE `uzytk_prod` (
  `id_uzytk_prod` int(11) NOT NULL,
  `id_uzytk` int(5) NOT NULL,
  `id_prod` int(5) NOT NULL,
  `posilek` int(2) NOT NULL,
  `dzien` int(1) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytk_prod`
--

INSERT INTO `uzytk_prod` (`id_uzytk_prod`, `id_uzytk`, `id_prod`, `posilek`, `dzien`, `ilosc`) VALUES
(25, 8, 1, 1, 1, 100),
(26, 8, 4, 1, 1, 100),
(27, 8, 3, 1, 1, 200);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jednostki`
--
ALTER TABLE `jednostki`
  ADD PRIMARY KEY (`id_jedno`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kateg`);

--
-- Indexes for table `parametry`
--
ALTER TABLE `parametry`
  ADD PRIMARY KEY (`id_param`);

--
-- Indexes for table `podkategorie`
--
ALTER TABLE `podkategorie`
  ADD PRIMARY KEY (`id_podkateg`),
  ADD KEY `id_kateg` (`id_kateg`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_podkateg` (`id_podkateg`);

--
-- Indexes for table `produkt_param`
--
ALTER TABLE `produkt_param`
  ADD PRIMARY KEY (`id_prod_param`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_param` (`id_param`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytk`);

--
-- Indexes for table `uzytk_prod`
--
ALTER TABLE `uzytk_prod`
  ADD PRIMARY KEY (`id_uzytk_prod`),
  ADD KEY `id_uzytk` (`id_uzytk`),
  ADD KEY `id_prod` (`id_prod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `jednostki`
--
ALTER TABLE `jednostki`
  MODIFY `id_jedno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kateg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `parametry`
--
ALTER TABLE `parametry`
  MODIFY `id_param` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `podkategorie`
--
ALTER TABLE `podkategorie`
  MODIFY `id_podkateg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `produkt_param`
--
ALTER TABLE `produkt_param`
  MODIFY `id_prod_param` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `uzytk_prod`
--
ALTER TABLE `uzytk_prod`
  MODIFY `id_uzytk_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `uzytk_prod`
--
ALTER TABLE `uzytk_prod`
  ADD CONSTRAINT `uzytk_prod_ibfk_1` FOREIGN KEY (`id_uzytk`) REFERENCES `uzytkownik` (`id_uzytk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uzytk_prod_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produkt` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
