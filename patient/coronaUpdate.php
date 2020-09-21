<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('../includes/simple_html_dom.php');
include ('navbar.php');
include ('sidebar.php');
?>
<div class="coronaUpdate">
    <h1 align="center">Coronavirus Update </h1>
    <form>
        <table class="table" border=1px>
            <tbody>
                <tr>
                    <td class="tdattribute">Total Coronavirus Cases:</td>
                    <td> <?php
                            $html=file_get_html('https://www.worldometers.info/coronavirus/');
                            echo $html->find('#maincounter-wrap span',0)->plaintext;
                            echo"<br>"; 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="tdattribute">Total Deaths:</td>
                    <td> <?php
                            $html=file_get_html('https://www.worldometers.info/coronavirus/');
                            echo $html->find('#maincounter-wrap span',1)->plaintext;
                            echo"<br>"; 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="tdattribute">Total Recovered:</td>
                    <td> <?php
                            $html=file_get_html('https://www.worldometers.info/coronavirus/');
                            echo $html->find('#maincounter-wrap span',2)->plaintext;
                            echo"<br>"; 
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <h6>Source: <a href="https://www.worldometers.info/coronavirus/">Worldometers</a> </h6>
</div>