<?php 

class Dashboard{

    private $connection;
    private $characters;

    public function __construct() {
        $config = new Configuration();
        $this->connection = $config->getDatabaseConnection('auth');
        $this->characters = $config->getDatabaseConnection('characters');
        $this->website = $config->getDatabaseConnection('website');
    }   

    public function total_accounts() {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM account");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }

    public function premiun_accounts() {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM account_premium");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }

    public function total_characters() {
        $stmt = $this->characters->prepare("SELECT COUNT(*) FROM characters");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }

    public function total_tickets() {
        $stmt = $this->characters->prepare("SELECT COUNT(*) FROM gm_ticket");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }

    public function total_arena_teams() {
        $stmt = $this->characters->prepare("SELECT COUNT(*) FROM arena_team");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }

    public function total_news() {
        $stmt = $this->website->prepare("SELECT COUNT(*) FROM news");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row['COUNT(*)'];
        $stmt->close();
        return $total;
    }
    
    public function get_template_name() {
        $stmt = $this->website->query("SELECT template_name FROM templates WHERE id = 1");
        
        if ($stmt) {
            $row = $stmt->fetch_assoc();
            return $row['template_name'];
        } else {
            error_log("Запрос не удался: " . $this->website->error);
            return null;
        }
    }

    public function update_template_name($new_template_name) {
        $stmt = $this->website->prepare("UPDATE templates SET template_name = ? WHERE id = 1");
        $stmt->bind_param("s", $new_template_name);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            error_log("Обновление не удалось: " . $stmt->error);
            $stmt->close();
            return false;
        }
    }
	
	public function get_languages() {
        $stmt = $this->website->prepare("SELECT * FROM languages");
        $stmt->execute();
        $result = $stmt->get_result();
        $languages = [];
    
    while ($row = $result->fetch_assoc()) {
        $languages[] = $row;
    }
    
        $stmt->close();
    return $languages;
}

    public function update_language_status($lang_code, $status) {
        $stmt = $this->website->prepare("UPDATE languages SET is_active = 0 WHERE is_active = 1");
    if (!$stmt->execute()) {
        error_log("Не удалось деактивировать языки: " . $stmt->error);
        $stmt->close();
        return false;
    }
        $stmt->close();

        $stmt = $this->website->prepare("UPDATE languages SET is_active = ? WHERE lang_code = ?");
        $stmt->bind_param("is", $status, $lang_code);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        error_log("Обновление не удалось: " . $stmt->error);
        $stmt->close();
        return false;
    }
}

public function get_gm_logs($page = 1, $limit = 10) {
    $offset = ($page - 1) * $limit;
    $stmt = $this->connection->prepare("SELECT * FROM account_gm_log_item ORDER BY time DESC LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $logs = [];
    
    while ($row = $result->fetch_assoc()) {
        $logs[] = $row;
    }
    
    $stmt->close();
    return $logs;
}

public function get_gm_logs_count() {
    $stmt = $this->connection->prepare("SELECT COUNT(*) as total FROM account_gm_log_item");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total = $row['total'];
    $stmt->close();
    return $total;
}

public function get_total_pages($limit = 10) {
    $total_logs = $this->get_gm_logs_count();
    return ceil($total_logs / $limit);
}

public function get_race_class_statistics() {
    $race_stats = [];
    $class_stats = [];

    $races = [
        1 => 'Человек',
        2 => 'Орк',
        3 => 'Дворф',
        4 => 'Ночной Эльф',
        5 => 'Нежить',
        6 => 'Таурен',
        7 => 'Гном',
        8 => 'Троль',
        9 => 'Гоблин',
        10 => 'Эльф Крови',
        11 => 'Дреней',
        12 => 'Ворген',
    ];

    foreach ($races as $race_id => $race_name) {
        $stmt = $this->characters->prepare("SELECT COUNT(*) as count FROM characters WHERE race = ?");
        $stmt->bind_param("i", $race_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $race_stats[$race_name] = $row['count'];
    }

    $classes = [
        1 => 'Воин',
        2 => 'Паладин',
        3 => 'Охотник',
        4 => 'Разбойник',
        5 => 'Жрец',
        6 => 'Рыцарь Крови',
        7 => 'Шаман',
        8 => 'Маг',
        9 => 'Чернокнижник',
        11 => 'Друид',
    ];

    foreach ($classes as $class_id => $class_name) {
        $stmt = $this->characters->prepare("SELECT COUNT(*) as count FROM characters WHERE class = ?");
        $stmt->bind_param("i", $class_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $class_stats[$class_name] = $row['count'];
    }

    return [$race_stats, $class_stats];
}


}

?>