<?php 

require_once("./conf/conf.php");

require_once("./models/skillModel.php");

class SkillController {

    public function readAll(): array
    {
        global $pdo;
        $sql = "SELECT * FROM skill";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "SkillModel");

        foreach($result as $skill){
            $this->loadProjectsFromSkills($skill);
        }

        return $result;
    }

    public function readOne(int $id): SkillModel {
        global $pdo;

        // Requête de récupération du projet
        $sql = "SELECT * FROM skill WHERE id_skill = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_CLASS, "SkillModel");
        $result = $statement->fetch();

        $this->loadProjectsFromSkills($result);

        return $result;
    }

    public function loadProjectsFromSkills(SkillModel $skill)
    {
        global $pdo;
        // TODO: remplacer skill par project et inversement
        $sql = "SELECT skill.id_skill, skill.name, skill.level, skill.picture
        FROM skill
        JOIN skill_project ON skill_project.id_skill = skill.id_skill
        JOIN project ON project.id_project = skill_project.id_project
        WHERE project.id_project = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $project->id_project, PDO::PARAM_INT);
        $statement->execute();

        $project->skills = $statement->fetchAll(PDO::FETCH_CLASS, "SkillModel");
    }
}

?>