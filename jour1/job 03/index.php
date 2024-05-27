
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

    <?php
    // Définition des variables
    $element_du_tableau = [
        'age de yoda ado' => 123,
        'salutation de yoda' => 'jourbon',
        'force physique  du ptit bon-homme' => 45.67,
        'il est pas rouge' => true,
    ];

    // Fonction pour obtenir le type de variable en format lisible
    function getTypeHumanReadable($element_du_tableau) {
        switch (gettype($element_du_tableau)) {
            case 'boolean':
                return 'Boolean';
            case 'integer':
                return 'carré frère';
            case 'double': // double est utilisé pour les floats en PHP
                return 'Float';
            case 'string':
                return 'String';
            case 'array':
                return 'Array';
            case 'object':
                return 'Object';
            case 'resource':
                return 'Resource';
            case 'NULL':
                return 'NULL';
            default:
                return 'Unknown';
        }
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($element_du_tableau as $name => $value): ?>
                <tr>
                    <td><?php echo getTypeHumanReadable($value); ?></td>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><?php echo htmlspecialchars(var_export($value, true)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
