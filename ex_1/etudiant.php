<?php
class Etudiant {
    public $nom;
    public $notes = [];

    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    public function calculerMoyenne() {
        return array_sum($this->notes)/count($this->notes);
    }

    public function estAdmis() {
        return $this->calculerMoyenne() >= 10 ? "admis":"non admis";
    }

    public function afficherResultats() {
        $moyenne = $this->calculerMoyenne();
        ?>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4><?= $this->nom; ?></h4>
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr><th>Notes</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->notes as $note): 
                                $color = ($note < 10) ? 'table-danger' : (($note == 10) ? 'table-warning' : 'table-success'); ?>
                                <tr class="<?= $color; ?>">
                                    <td><?= $note; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p><strong>Moyenne :</strong> <?= number_format($moyenne, 2); ?></p>
                    <p><strong>Résultat :</strong> <span class=""><?= $this->estAdmis(); ?></span></p>
                </div>
            </div>
        </div>
        <?php
    }
}

$etudiants = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];

?>