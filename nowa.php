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
            echo '<input class="DODAJ" type="text" name="dane"></input><input class="DODAJ" type="submit" value="DODAJ" name="dodaj"></input>';
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
        }

    
          ?>
          </div>
    </div>
    <div id="stopka"></div>
</body>
</html>