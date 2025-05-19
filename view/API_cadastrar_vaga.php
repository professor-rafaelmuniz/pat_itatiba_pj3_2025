<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

// Mostra erros no desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco

        $host = 'localhost';
        $db = 'u710448691_db_pat';
        $user = 'u710448691_usr_pat';
        $pass = 'Pat_123#';
		$charset = 'utf8mb4';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na conexão com o banco de dados: " . $e->getMessage()]);
    exit;
}


$data = json_decode(file_get_contents("php://input"), true);


if (!$data || empty($data["vaga_titulo"]) || empty($data["vaga_descricao"])) {
    http_response_code(400);
    echo json_encode(["erro" => "Campos obrigatórios não informados."]);
    exit;
}

require_once '../class/VagaClass.php'; // ajuste o caminho
require_once '../class/EmpresaClass.php'; // ajuste o caminho

$vaga = new VagaClass($data);

try {
    $stmt = $pdo->prepare("
        INSERT INTO tb_vaga (
            vaga_titulo,
            vaga_descricao,
            vaga_salario,
            vaga_quantidade,
            vaga_beneficios,
            vaga_horario,
            vaga_tipo_contratacao,
            vaga_latitude,
            vaga_longitude,
            vaga_empresa_fk
        ) VALUES (
            :titulo,
            :descricao,
            :salario,
            :quantidade,
            :beneficios,
            :horario,
            :tipo_contratacao,
            :latitude,
            :longitude,
            :empresa_id
        )
    ");

    $stmt->execute([
        ':titulo'           => $data['vaga_titulo'],
        ':descricao'        => $data['vaga_descricao'],
        ':salario'          => $data['vaga_salario'],
        ':quantidade'       => $data['vaga_quantidade'],
        ':beneficios'       => $data['vaga_beneficios'],
        ':horario'          => $data['vaga_horario'],
        ':tipo_contratacao' => $data['vaga_tipo_contratacao'],
        ':latitude'         => $data['vaga_latitude'],
        ':longitude'        => $data['vaga_longitude'],
        ':empresa_id'       => $data['empresa_id']
    ]);

    echo json_encode(["mensagem" => "Vaga cadastrada com sucesso!"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao cadastrar vaga: " . $e->getMessage()]);
}
?>