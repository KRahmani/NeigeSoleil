
    <div >
            <!-- zone de connexion -->
            <form method ="post" action="">
                <div style="text-align: center;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Mr
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Mme
                        </label>
                    </div>
                </div>
                <label id = "name_user"><b>Nom</b></label>
                <input  type="text" placeholder="Nom" name="nom" required>
                <label><b>Prenom</b></label>
                <input  type="text" placeholder="Prenom"  name ="prenom" required>
                <label><b>Mail</b></label>
                <input  type="email" placeholder="myacount@neige&soleil.com"  name = "mail" required>
                <label><b>Address</b></label>
                <input  type="text" placeholder="Address"  name="address" required>
                <label><b>Code postal</b></label>
                <input  type="text" placeholder="Code postal" name="code_postal" required>
                <label><b>Ville</b></label>
                <input  type="text" placeholder="Ville" name="ville" required>
                <label><b>Téléphone</b></label>
                <input  type="text" placeholder="Téléphone 07***" name="telephone" required>
                <label><b>Mot de passe</b></label>
                <input  type="password" placeholder="******"  name="mot passe" required>
                <label><b>Confirmation de mot de passe</b></label>
                <input  type="password" placeholder="******" name="con mot de passe" required>
				<div style= "text-align: center;">
					<input name = "inscription" style = "padding: 0.1em 1.9em;" type="submit" id='' value='Inscription' >
				</div>
            </form>
        </div>
