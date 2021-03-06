<?php 
namespace Home;
unset_session("produits");
unset_session("commande-encours");

if ($this->getId() != null) {
	$datas = BOUTIQUE::findBy(["id ="=>$this->getId()]);
	if (count($datas) > 0) {
		$boutique = $datas[0];
		$boutique->actualise();

		$comptecourant = $boutique->comptebanque;

		$date1 = getSession("date1");
		$date2 = getSession("date2");
		if ($date1  == null) {
			$date1 = dateAjoute(-10);
		}
		if ($date2  == null) {
			$date2 = dateAjoute();
		}




		$operations = OPERATION::findBy(["DATE(created) >= "=> $date1, "DATE(created) <= "=>$date2]);
		foreach ($operations as $key => $value) {
			$value->actualise();
			$value->fiche = "boncaisse";
			$value->type = $value->categorieoperation->name();
		}
		$clients = REGLEMENTCLIENT::findBy(["DATE(created) >= "=> $date1, "DATE(created) <= "=>$date2]);
		foreach ($clients as $key => $value) {
			$value->actualise();
			$value->fiche = "boncaisse";
			$value->type = "Reglement de client";
		}
		$fournisseurs = REGLEMENTFOURNISSEUR::findBy(["DATE(created) >= "=> $date1, "DATE(created) <= "=>$date2]);
		foreach ($fournisseurs as $key => $value) {
			$value->actualise();
			$value->fiche = "boncaisse";
			$value->type = "Reglement de fournisseur";
		}
		$payes = LIGNEPAYEMENT::findBy(["DATE(created) >= "=> $date1, "DATE(created) <= "=>$date2]);
		foreach ($payes as $key => $value) {
			$value->actualise();
			$value->fiche = "boncaisse";
			$value->type = "Paye de commercial";
		}

		$tableau = array_merge($operations, $clients, $fournisseurs, $payes);
		usort($tableau, "comparerDateCreated");

		$entrees = $depenses = 0;
		foreach ($tableau as $key => $value) {
			if ($value->mouvement->comptebanque_id == COMPTEBANQUE::COURANT) {
				if ($value->mouvement->typemouvement_id == TYPEMOUVEMENT::DEPOT) {
					$entrees += $value->mouvement->montant;
				}else{
					$depenses += $value->mouvement->montant;
				}
			}else{
				unset($tableau[$key]);
			}

		}
		$statistiques = OPERATION::statistiques($boutique->getId());


		session("boutique_id", $this->getId());
		$produits = PRODUIT::findBy(["isActive ="=>TABLE::OUI]);
		$rupture = 0;
		$tableaux = [];
		foreach ($produits as $key => $produit) {
			$tab = [];
			foreach ($produit->fourni('prixdevente', ["isActive ="=>TABLE::OUI]) as $key => $pdv) {
				$pdv->actualise();
				$data = new \stdclass();
				$data->id = $pdv->getId();
				$data->pdv = $pdv;
				$pdv->tab = [];

				$data->name = $pdv->produit->name()." // ".$pdv->prix->price()/*." ".$params->devise*/;
				$data->prix = $pdv->prix->price()." ".$params->devise;
				$data->quantite = $pdv->quantite->name();
				$data->boutique = $pdv->enBoutique($date2, $boutique->getId());
				$data->commande = $pdv->commandee($boutique->getId());
				$data->rupture = false;
				if ($data->boutique <= $params->ruptureStock) {
					$data->rupture = true;
					$rupture++;
				}	
				$tab[] = $data;
			}
			$tableaux[$produit->getId()] = $tab;
		}

		$title = "GRG | ".$boutique->name();

		$stats = VENTE::stats($date1, $date2, $boutique->getId());

		$productionjours = PRODUCTIONJOUR::findBy(["DATE(created) >= "=> $date1, "DATE(created) <= "=>$date2], [],["ladate"=>"DESC"]);
		usort($productionjours, 'comparerLadate');

	}else{
		header("Location: ../master/dashboard");
	}
}else{
	header("Location: ../master/dashboard");
}
?>