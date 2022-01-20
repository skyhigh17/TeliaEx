<html>
Veebiarendaja proovitöö
Eesmärk on luua veebirakendus, mis koosneb kahest osast:
● Kliendivaade - erinevad ekraanid;
● Haldamise vaade - saab hallata ekraane ja ekraaniga seotud vaateid.
Praktiline kasutusjuhtum: digiesinduse ekraanid, mille lahenduse hiljuti tegime.
Haldamise funktsionaalsused
1) Haldusliideses saab lisada ekraane koos ekraanide juurde käivate valikutega
2) Saab määrata, milliseid vaateid antud ekraan kuvab.
Näide:
Lisan ekraani nimega “Ekraan 1” ja märgin juurde, et sellel ekraanil saab kuvada järgmisi
vaateid: Vaade 1, Vaade 2, Vaade 3. Ekraan saab olla kolmes keeles - eesti, vene ja inglise.
Vaade 1 ja vaade 2 on tavaliselt html sisud, võib olla “lorem ipsum” sisuga vaade.
Vaade 3 sisaldab endas infot, et “Teenus tuleb tagasi müüki Kuupäeval. Kuupäeva valik
peaks olema juhitav haldusliidesest antud vaate kohta.
Kliendivaade - erinevad ekraanid
Kui haldusliideses on lisatud vähemalt üks ekraan, siis on võimalik seda vaadata - näiteks
/rakendus/ekraan1. Pole oluline, et millist vaadet rakendus seal by default kuvab, oluline on et
vaadet saaks haldusest juhtida.
Kui Ekraan 1 on haldusest lisatud ja seda saab mingil aadressil külastada, siis peaks saama
seal kuvatud vaadet ning vaate keelsust haldusest muuta.
Näide:
Lähen aadressile /rakendus/ekraan1 ja näen seal vaade 1-te eesti keeles. Nüüd kui haldusest
määrata, et Ekraan 1 kuvab hoopis vaade 2-e ja vene keeles, siis peaks minul see info /ekraan1
aadressil ise õigeks muutuma.
Samamoodi võiks keelsust ka ekraanilt endalt saada muuta. Ehk nüüd kui ma olen
/rakendus/ekraan1 aadressil, mis näitab Vaadet 2 vene keeles, siis saan selle näiteks ise inglise
keelseks muuta ja haldusest on näha, et ekraan 1 kuvab vaade 2-te inglise keeles.

<div><p><strong>Kasutusjuhend:</strong></p><p> Migreeri andmebaas(mysql) ja seede vaadete tabel: <strong> php artisan db:seed vaade </strong></p></div>
<div>Halduslehel sisesta andmed, peale seda saad liikuda vastavasse kliendi vaatesse(Ekraani) ja muuta Halduslehel olevaid Ekraane/vaateid,<br> 
ekraanides saad navigeerida halduslehel sisestatud urli kaudu lihtsalt /ekraan1 näiteks</div>
<div>Haldusleht asub siin-> <a href="{{url('/admin')}}">Admin Leht</a><div>
<div>
   <br> Edasi arendusi saaks kõvasti teha antud ülesandel(näiteks tõlkida keeled,testid, keelte valik andmebaasi, valideerimised jne), aga lähtusin ülesande lahendist hetkel oma ajakasutuse huvides
</div>
</html>