<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza danych</title>
    <link rel="stylesheet" href="dd.css">
</head>
<body>
    <div id="baner">
        <h1>Wyszukaj dane</h1>
    </div>
    <div id="srodek">
    <form method="post">
        <div id="lewo">
        <input type="submit" value= "filmy" name="filmy"></input><br><br>
        <input type="submit" value= "filmy_rodzaj" name="filmy_rodzaj"></input><br><br>
        <input type="submit" value= "rodzaj_filmu" name="rodzaj_filmu"></input><br><br>
        <input type="submit" value= "seanse" name="seanse"></input><br><br>
        <input type="submit" value= "klienci" name="klienci"></input><br><br>
        <input type="submit" value= "bilety" name="bilety"></input><br><br>
        <input type="submit" value= "sale" name="sale"></input><br><br>
        <input type="submit" value= "sprzedawcy" name="sprzedawcy"></input><br><br>
        </form>
        </div>

        <div id="prawo">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kino"; 
        $conn = new mysqli($servername, $username, $password, $database);
    
        if ($conn->connect_error) {
            die("Błąd połączenia: " . $conn->connect_error);
        }
    
        $filmy = mysqli_query($conn, "select * from filmy");
        $filmy_rodzaj = mysqli_query($conn, "select * from filmy_rodzaj");
        $bilety = mysqli_query($conn, "select * from bilety");
        $rodzaj_filmu = mysqli_query($conn, "select * from rodzaj_filmu");
        $seanse = mysqli_query($conn, "select * from seanse");
        $klienci = mysqli_query($conn, "select * from klienci");
        $sale = mysqli_query($conn, "select * from sale");
        $sprzedawcy = mysqli_query($conn, "select * from sprzedawcy");
    
        if(isset($_POST["filmy"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Tytul</td>
                <td>Rezyser</td>
                <td>Czas_trwania</td>
            </tr>";
            while($row = mysqli_fetch_assoc($filmy)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Tytul']. "</td>
                <td>".$row['Rezyser']. "</td>
                <td>".$row['Czas_trwania']. "</td>
                </tr>";
            }
            echo "</table><br>";
            echo '
                <form method="POST">
                    <div id="dif">
                    Dodaj tytuł<input type="text" class="DODAJ" name="tytul">
                    Dodaj reżysera<input type="text" class="DODAJ" name="rezyser">
                    Czas trwania<input type="text" class="DODAJ" name="czas">
                    </div><br>
                    <input type="hidden" name="przeslij" value="przes"></input>
                    <input type="submit" value="przeslij"  id="przeslij"></input>
                </form>
            ';
      }
      if(isset($_POST["przeslij"])){
            if(empty($_POST["tytul"]) || empty($_POST["rezyser"]) || empty($_POST["czas"])){
                echo "Wprowadź dane!";
            }
            else{
                $tytul = $_POST["tytul"];
                $rezyser = $_POST["rezyser"];
                $czas = $_POST["czas"];

                $wprowadz = "insert into filmy(Tytul,Rezyser,Czas_trwania) values('$tytul','$rezyser','$czas')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        }   

      
        if(isset($_POST["filmy_rodzaj"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Filmy_ID</td>
                <td>Rodzaj_ID</td>
            </tr>";
            while($row = mysqli_fetch_assoc($filmy_rodzaj)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Filmy_ID']."</td>
                <td>".$row['Rodzaj_ID']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj ID filmu<input type="text" class="DODAJ" name="film">
                Podaj ID rodzaju<input type="text" class="DODAJ" name="rodzaj">
                </div><br>
                <input type="hidden" name="przeslij2" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
    }
    if(isset($_POST["przeslij2"])){
        if(empty($_POST["film"]) || empty($_POST["rodzaj"])){
            echo "Wprowadź dane!";
        }
        else{
            $Film_ID = $_POST["film"];
            $Rodzaj_ID = $_POST["rodzaj"];

            $wprowadz = "insert into filmy_rodzaj(Filmy_ID,Rodzaj_ID) values('$Film_ID','$Rodzaj_ID')";
            $run = mysqli_query($conn,$wprowadz);
            if($run){
                echo "Wprowadzono dane!";
            }
            else{
                echo "Nie wprowadzono danych";
            }
        }
    }   


        if(isset($_POST["bilety"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Seans_ID</td>
                <td>Sprzedawca_ID</td>
                <td>Klient_ID</td>
                <td>Cena</td>
            </tr>";
            while($row = mysqli_fetch_assoc($bilety)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Seans_ID']."</td>
                <td>".$row['Sprzedawca_ID']."</td>
                <td>".$row['Klient_ID']."</td>
                <td>".$row['Cena']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj ID seansu<input type="text" class="DODAJ" name="Seans_ID">
                Podaj ID sprzedawcy<input type="text" class="DODAJ" name="Sprzedawca_ID">
                Podaj ID klienta<input type="text" class="DODAJ" name="Klient_ID">
                Podaj cenę<input type="text" class="DODAJ" name="Cena">
                </div><br>
                <input type="hidden" name="przeslij3" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
    }
    if(isset($_POST["przeslij3"])){
        if(empty($_POST["Seans_ID"]) || empty($_POST["Sprzedawca_ID"]) || empty($_POST["Klient_ID"]) || empty($_POST["Cena"])){
            echo "Wprowadź dane!";
        }
        else{
            $Seans_ID = $_POST["Seans_ID"];
            $Sprzedawca_ID = $_POST["Sprzedawca_ID"];
            $Klient_ID = $_POST["Klient_ID"];
            $Cena = $_POST["Cena"];

            $wprowadz = "insert into bilety(Seans_ID,Sprzedawca_ID,Klient_ID,Cena) values('$Seans_ID','$Sprzedawca_ID','$Klient_ID','$Cena')";
            $run = mysqli_query($conn,$wprowadz);
            if($run){
                echo "Wprowadzono dane!";
            }
            else{
                echo "Nie wprowadzono danych";
            }
        }
    }  


        if(isset($_POST["rodzaj_filmu"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Nazwa</td>
            </tr>";
            while($row = mysqli_fetch_assoc($rodzaj_filmu)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Nazwa']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj nazwę rodzaju<input type="text" class="DODAJ" name="Nazwa">
                </div><br>
                <input type="hidden" name="przeslij8" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
        }
        if(isset($_POST["przeslij8"])){
            if(empty($_POST["Nazwa"])){
                echo "Wprowadź dane!";
            }
            else{
                $Nazwa = $_POST["Nazwa"];

                $wprowadz = "insert into rodzaj_filmu(Nazwa) values('$Nazwa')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        }  


        if(isset($_POST["seanse"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Termin</td>
                <td>Sala_ID</td>
                <td>Film_ID</td>
                <td>Liczba_wolnych_miejsc</td>
            </tr>";
            while($row = mysqli_fetch_assoc($seanse)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Termin']."</td>
                <td>".$row['Sala_ID']."</td>
                <td>".$row['Film_ID']."</td>
                <td>".$row['Liczba_wolnych_miejsc']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj termin<input type="text" class="DODAJ" name="Termin">
                Podaj ID sali<input type="text" class="DODAJ" name="Sala_ID">
                Podaj ID filmu<input type="text" class="DODAJ" name="Film_ID">
                Podaj liczbe wolnych miejsc<input type="text" class="DODAJ" name="Liczba_wolnych_miejsc">
                </div><br>
                <input type="hidden" name="przeslij4" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
        }
        if(isset($_POST["przeslij4"])){
            if(empty($_POST["Termin"]) || empty($_POST["Sala_ID"]) || empty($_POST["Film_ID"]) || empty($_POST["Liczba_wolnych_miejsc"])){
                echo "Wprowadź dane!";
            }
            else{
                $Termin = $_POST["Termin"];
                $Sala_ID = $_POST["Sala_ID"];
                $Film_ID = $_POST["Film_ID"];
                $Liczba_wolnych_miejsc = $_POST["Liczba_wolnych_miejsc"];
    
                $wprowadz = "insert into seanse(Termin,Sala_ID,Film_ID,Liczba_wolnych_miejsc) values('$Termin','$Sala_ID','$Film_ID','$Liczba_wolnych_miejsc')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        }  
        


        if(isset($_POST["klienci"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td>Mail</td>
            </tr>";
            while($row = mysqli_fetch_assoc($klienci)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Imie']."</td>
                <td>".$row['Nazwisko']."</td>
                <td>".$row['Mail']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj imię<input type="text" class="DODAJ" name="Imie">
                Podaj nazwisko<input type="text" class="DODAJ" name="Nazwisko">
                Podaj mail<input type="text" class="DODAJ" name="Mail">
                </div><br>
                <input type="hidden" name="przeslij5" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
        }
        if(isset($_POST["przeslij5"])){
            if(empty($_POST["Imie"]) || empty($_POST["Nazwisko"]) || empty($_POST["Mail"])){
                echo "Wprowadź dane!";
            }
            else{
                $Imie = $_POST["Imie"];
                $Nazwisko = $_POST["Nazwisko"];
                $Mail = $_POST["Mail"];
    
                $wprowadz = "insert into klienci(Imie,Nazwisko,Mail) values('$Imie','$Nazwisko','$Mail')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        }  


        if(isset($_POST["sale"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Ilosc_miejsc</td>
            </tr>";
            while($row = mysqli_fetch_assoc($sale)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Ilosc_miejsc']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj ilosc miejsc<input type="text" class="DODAJ" name="iloscmiejsc">
                </div><br>
                <input type="hidden" name="przeslij6" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';
        }
        if(isset($_POST["przeslij6"])){
            if(empty($_POST["iloscmiejsc"])){
                echo "Wprowadź dane!";
            }
            else{
                $iloscmiejsc = $_POST["iloscmiejsc"];
    
                $wprowadz = "insert into sale(Ilosc_miejsc) values('$iloscmiejsc')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        } 


        if(isset($_POST["sprzedawcy"])){
            echo 
            "<table>
            <tr>
                <td>ID</td>
                <td>Imie</td>
                <td>Nazwisko</td>
            </tr>";
            while($row = mysqli_fetch_assoc($sprzedawcy)){
                echo "<tr>
                <td>".$row['ID']. "</td>
                <td>".$row['Imie']."</td>
                <td>".$row['Nazwisko']."</td>
                </tr>";
            }
            echo "</table>";
            echo '
            <form method="POST">
                <div id="dif">
                Podaj imię<input type="text" class="DODAJ" name="Imie">
                Podaj nazwisko<input type="text" class="DODAJ" name="Nazwisko">
                </div><br>
                <input type="hidden" name="przeslij7" value="przes"></input>
                <input type="submit" value="przeslij"  id="przeslij"></input>
            </form>
        ';     
        }
        if(isset($_POST["przeslij7"])){
            if(empty($_POST["Imie"]) || empty($_POST["Nazwisko"])){
                echo "Wprowadź dane!";
            }
            else{
                $Imie = $_POST["Imie"];
                $Nazwisko = $_POST["Nazwisko"];
    
                $wprowadz = "insert into sprzedawcy(Imie,Nazwisko) values('$Imie','$Nazwisko')";
                $run = mysqli_query($conn,$wprowadz);
                if($run){
                    echo "Wprowadzono dane!";
                }
                else{
                    echo "Nie wprowadzono danych";
                }
            }
        }  

    
          ?>
          </div>
    </div>
    <div id="stopka"></div>
</body>
</html>