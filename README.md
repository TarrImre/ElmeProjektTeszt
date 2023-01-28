# Valutaváltó projekt Codeigniter 4 használatával

[Demo](https://toxy.hu/elme/public/)

#### Feladat:
Készítsen egy valutá váltó alkalmazást, ami a napiarfolyam.hu oldalon elérhető free API-n keresztül éri el az aktuális árfolyamokat.

A főoldali felületen jelenlen meg egymás mellett 2 block. Mindkét block tartalmazzon egy beviteli mezőt, ahol megadhatjuk az átváltani kívánt összeget. Alattuk jelenjen meg egy legördülő menü ahonnan ki lehessen választani az adott blokk beviteli mezőjének pénznemét. A legördülők alatt legyen egy - egy gomb.
Ha az első block gombját megnyomjuk, akkor az ezen blockba beírt összeg és valuta értékét váltsa át a második blockban beállított valuta alapján, és írja be a második blockban lévő beviteli mezőbe a számított értéket.

A folyamat fordítva is működik, azaz ha a második block beviteli mezőjébe írunk egy összeget és megnyomjuk ezen block alján lévő gombot, akkor ezen második blokban lévő valuta alapján, kiszámolja az első blockban beállított valuta szerinti értéket, és beírja azt az egyes block beviteli mezőjébe.

Az API napi árfolyamait (az összes elérhető valutánál), az adott nap első használatakor írjuk be adatbázisba, és onnantól ne az API-t használjuk a számításokhoz, hanem a belső mysql adatbázisból vegyük az adatot.

A főoldal felületén a 2 block felett jelenítsük meg az utolsó 3 nap EUR és USD árát forintban.
A felület legyen reszponzív, használja a bootstrap 5-ös verzióját.
Az adatbázis felépítéséhez használja a codeigniter 4 beépített migrációs funkcióit.
A formot is (js) és az üzleti logikát is validálja.
Az alkalmazást CodeIgniter 4 alatt valósítsa meg, HMVC használatával. A modul neve legyen: Valuta
Plusz pontért a hibaüzeneteket jelenítse meg sweetalert2 js plugin használatával.

