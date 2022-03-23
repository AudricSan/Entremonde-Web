<?php
$title = 'about us';
include_once("../public/include/header.php");
?>
<section>
    <article role="contacts">
        <div class="contacts">
            <p>Contacts</p>
        </div>

        <form>
            <fieldset>
                <legend> Vos coordonnées</legend>
                <label for="nom"> Nom :</label><input type="text" name="nom" id="nom" required /><br />
                <label for="prenom">Prénom :</label><input type="text" name="prenom" id="prenom" required /><br />
                <label for="tel">Téléphone :</label><input type="tel" name="tel" id="tel" /><br />
                <label for="mail">Mail :</label><input type="email" name="mail" id="mail" required placeholder="mail@domain.com" />
            </fieldset>


            <fieldset class="question">
                <legend> Votre question</legend>
                <textarea cols="50" rows="5" id="question" name="question"></textarea>
            </fieldset>


            <div class="button">
                <input type="Envoyer">
            </div>
        </form>
    </article>
</section>

<?php include_once("../public/include/footer.php"); ?>