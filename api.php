<?php
    //values for example
    declare(strict_types=1);

    class School
{
    private $students = [];

    public function numberOfStudents(): int {
        return count($this->students);
    }

    public function add(string $name, int $grade): void {
        $this->students[$name] = $grade;
    }

    public function grade(int $grade): array {
        $result = [];
        foreach ($this->students as $name => $studentGrade) {
            if ($studentGrade === $grade) {
                $result[] = $name;
            }
        }
        sort($result);
        return $result;
    }

    public function studentsByGradeAlphabetical(): array {
        $result = [];
        $grades = array_unique(array_values($this->students));
        sort($grades);

        foreach ($grades as $grade) {
            $result[$grade] = $this->grade($grade);
        }

        return $result;
    }
}


?>
