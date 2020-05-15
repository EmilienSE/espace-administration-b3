document.getElementById("btn_supression").addEventListener("click", function() {
	var p = document.createElement('<div class="overlay"><div class="modal"><div class="modal-text"><p>Etes-vous sûr de vouloir supprimer cet élément ? </p></div><div class="modal-control"><button>Annuler</button><button>OK</button></div></div></div>');
	document.body.appendChild(p);
});

