-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2026. Már 09. 14:12
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ugyvedess`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dokumentumok`
--

CREATE TABLE `dokumentumok` (
  `id` int(11) NOT NULL,
  `ugyfel_id` int(11) DEFAULT NULL,
  `ugyszam` int(11) DEFAULT NULL,
  `dokumentum_tipusa` varchar(50) DEFAULT NULL,
  `feltoltes_datuma` date DEFAULT NULL,
  `megjegyzes` text DEFAULT NULL,
  `fajl` varchar(200) DEFAULT NULL,
  `szamla` tinyint(1) DEFAULT NULL,
  `felado` varchar(100) DEFAULT NULL,
  `cimzett` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feladatok`
--

CREATE TABLE `feladatok` (
  `id` int(11) NOT NULL,
  `ugyszam` int(11) DEFAULT NULL,
  `hatarido` date DEFAULT NULL,
  `feladat` text DEFAULT NULL,
  `csatolmany` varchar(200) DEFAULT NULL,
  `felado_neve` varchar(100) DEFAULT NULL,
  `cimzett_neve` varchar(100) DEFAULT NULL,
  `munkaora` decimal(5,2) NOT NULL DEFAULT 0.00,
  `befejezve` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jelszo` varchar(255) DEFAULT NULL,
  `ketfaktoros_belepes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hataridok`
--

CREATE TABLE `hataridok` (
  `id` int(11) NOT NULL,
  `ugyszam` int(11) DEFAULT NULL,
  `ugyfel_id` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `ido` time DEFAULT NULL,
  `leiras` text DEFAULT NULL,
  `helyszin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `levelezesek`
--

CREATE TABLE `levelezesek` (
  `id` int(11) NOT NULL,
  `ugyszam` int(11) DEFAULT NULL,
  `statusz` varchar(50) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `level` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szamlazas`
--

CREATE TABLE `szamlazas` (
  `id` int(11) NOT NULL,
  `sablon_szoveg` text DEFAULT NULL,
  `ugyfel_id` int(11) DEFAULT NULL,
  `ugyszam` int(11) DEFAULT NULL,
  `honap` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ugyek`
--

CREATE TABLE `ugyek` (
  `ugyszam` int(11) NOT NULL,
  `ugyfel_neve` varchar(100) DEFAULT NULL,
  `ellenerdeku_fel` varchar(100) DEFAULT NULL,
  `ugy_elnevezese` varchar(150) DEFAULT NULL,
  `ugy_tipusa` varchar(50) DEFAULT NULL,
  `leiras` text DEFAULT NULL,
  `statusz` varchar(50) DEFAULT NULL,
  `user_ID` varchar(100) DEFAULT NULL,
  `dijazas` varchar(50) DEFAULT NULL,
  `munkaorak_osszesitett` decimal(5,2) DEFAULT NULL,
  `hataridok` date DEFAULT NULL,
  `ertesites` varchar(50) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `lezarva` tinyint(1) NOT NULL DEFAULT 0,
  `eltelt_munkaora` decimal(5,2) DEFAULT 0.00,
  `munka_kezdete` datetime DEFAULT NULL,
  `munka_vege` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eseményindítók `ugyek`
--
DELIMITER $$
CREATE TRIGGER `trg_eltelt_munkaora_insert` BEFORE INSERT ON `ugyek` FOR EACH ROW BEGIN
    IF NEW.munka_kezdete IS NOT NULL AND NEW.munka_vege IS NOT NULL THEN
        SET NEW.eltelt_munkaora = TIMESTAMPDIFF(MINUTE, NEW.munka_kezdete, NEW.munka_vege)/60;
    ELSE
        SET NEW.eltelt_munkaora = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_eltelt_munkaora_update` BEFORE UPDATE ON `ugyek` FOR EACH ROW BEGIN
    IF NEW.munka_kezdete IS NOT NULL AND NEW.munka_vege IS NOT NULL THEN
        SET NEW.eltelt_munkaora = TIMESTAMPDIFF(MINUTE, NEW.munka_kezdete, NEW.munka_vege)/60;
    ELSE
        SET NEW.eltelt_munkaora = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ugyfelek`
--

CREATE TABLE `ugyfelek` (
  `ugyfel_id` int(11) NOT NULL,
  `ugyfel_neve` varchar(100) DEFAULT NULL,
  `szuletesi_ido` date DEFAULT NULL,
  `szuletesi_hely` varchar(100) DEFAULT NULL,
  `anyja_neve` varchar(100) DEFAULT NULL,
  `szemelyi_ig_szam` varchar(50) DEFAULT NULL,
  `lakcim` varchar(200) DEFAULT NULL,
  `telefonszam` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adoszam` varchar(50) DEFAULT NULL,
  `cegjegyzekszam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `dokumentumok`
--
ALTER TABLE `dokumentumok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ugyszam` (`ugyszam`),
  ADD KEY `ugyfel_id` (`ugyfel_id`);

--
-- A tábla indexei `feladatok`
--
ALTER TABLE `feladatok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ugyszam` (`ugyszam`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `hataridok`
--
ALTER TABLE `hataridok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ugyszam` (`ugyszam`),
  ADD KEY `ugyfel_id` (`ugyfel_id`);

--
-- A tábla indexei `levelezesek`
--
ALTER TABLE `levelezesek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ugyszam` (`ugyszam`);

--
-- A tábla indexei `szamlazas`
--
ALTER TABLE `szamlazas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ugyszam` (`ugyszam`),
  ADD KEY `ugyfel_id` (`ugyfel_id`);

--
-- A tábla indexei `ugyek`
--
ALTER TABLE `ugyek`
  ADD PRIMARY KEY (`ugyszam`);

--
-- A tábla indexei `ugyfelek`
--
ALTER TABLE `ugyfelek`
  ADD PRIMARY KEY (`ugyfel_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `dokumentumok`
--
ALTER TABLE `dokumentumok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `feladatok`
--
ALTER TABLE `feladatok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `hataridok`
--
ALTER TABLE `hataridok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `levelezesek`
--
ALTER TABLE `levelezesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `szamlazas`
--
ALTER TABLE `szamlazas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `ugyfelek`
--
ALTER TABLE `ugyfelek`
  MODIFY `ugyfel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `dokumentumok`
--
ALTER TABLE `dokumentumok`
  ADD CONSTRAINT `dokumentumok_ibfk_1` FOREIGN KEY (`ugyszam`) REFERENCES `ugyek` (`ugyszam`),
  ADD CONSTRAINT `dokumentumok_ibfk_2` FOREIGN KEY (`ugyfel_id`) REFERENCES `ugyfelek` (`ugyfel_id`);

--
-- Megkötések a táblához `feladatok`
--
ALTER TABLE `feladatok`
  ADD CONSTRAINT `feladatok_ibfk_1` FOREIGN KEY (`ugyszam`) REFERENCES `ugyek` (`ugyszam`);

--
-- Megkötések a táblához `hataridok`
--
ALTER TABLE `hataridok`
  ADD CONSTRAINT `hataridok_ibfk_1` FOREIGN KEY (`ugyszam`) REFERENCES `ugyek` (`ugyszam`),
  ADD CONSTRAINT `hataridok_ibfk_2` FOREIGN KEY (`ugyfel_id`) REFERENCES `ugyfelek` (`ugyfel_id`);

--
-- Megkötések a táblához `levelezesek`
--
ALTER TABLE `levelezesek`
  ADD CONSTRAINT `levelezesek_ibfk_1` FOREIGN KEY (`ugyszam`) REFERENCES `ugyek` (`ugyszam`);

--
-- Megkötések a táblához `szamlazas`
--
ALTER TABLE `szamlazas`
  ADD CONSTRAINT `szamlazas_ibfk_1` FOREIGN KEY (`ugyszam`) REFERENCES `ugyek` (`ugyszam`),
  ADD CONSTRAINT `szamlazas_ibfk_2` FOREIGN KEY (`ugyfel_id`) REFERENCES `ugyfelek` (`ugyfel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
