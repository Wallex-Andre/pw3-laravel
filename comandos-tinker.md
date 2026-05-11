# Relacionamentos Eloquent ORM no Laravel

Documentação das atividades práticas utilizando Laravel Tinker e relacionamentos Eloquent ORM.

# Tarefa A — Identidade Estudantil (Relacionamento 1:1)

## Objetivo

- Criar um aluno utilizando Factory.
- Criar um cartão estudantil associado ao aluno.
- Validar o relacionamento `1:1` entre `Student` e `StudentCard`.

---

## Código Utilizado

```php
$student = \App\Models\Student::factory()->create();

$student->studentCard()->create([
    'code' => 'STU-15423',
]);

$student->studentCard->code;
```

---

## Criação do Aluno

```php
$student = \App\Models\Student::factory()->create();

= App\Models\Student {#6471
    name: "Trace Kuhic",
    updated_at: "2026-05-11 00:55:10",
    created_at: "2026-05-11 00:55:10",
    id: 1,
}
```

---

## Criação do Cartão Estudantil

```php
$student->studentCard()->create([
    'code' => 'STU-15423',
]);

= App\Models\StudentCard {#7663
    code: "STU-15423",
    student_id: 1,
    updated_at: "2026-05-11 01:02:05",
    created_at: "2026-05-11 01:02:05",
    id: 1,
}
```

---

## Teste do Relacionamento

```php
$student->studentCard->code;

= "STU-15423"
```

---

# Tarefa B — Grade Escolar (Relacionamento 1:N)

## Objetivo

- Criar um professor chamado `Mestre Laravel`.
- Gerar 3 cursos vinculados ao professor utilizando Factory.
- Validar o relacionamento `1:N` entre `Teacher` e `Course`.

---

## Código Utilizado

```php
$teacher = \App\Models\Teacher::create(['name' => 'Mestre Laravel',]);

$courses = \App\Models\Course::factory(3)->create([
    'teacher_id' => $teacher->id,
]);

$teacher->courses->pluck('name');
```

---

## Criação do Professor

```php
$teacher = \App\Models\Teacher::create(['name' => 'Mestre Laravel',]);

= App\Models\Teacher {#7701
    name: "Mestre Laravel",
    updated_at: "2026-05-11 01:44:05",
    created_at: "2026-05-11 01:44:05",
    id: 1,
}
```

---

## Criação dos Cursos

```php
$courses = \App\Models\Course::factory(3)->create([
    'teacher_id' => $teacher->id,
]);

= Illuminate\Database\Eloquent\Collection {#7700
    all: [
      App\Models\Course {#7694
        name: "Glass Cutting Machine Operator Mastery",
        teacher_id: 1,
        updated_at: "2026-05-11 01:56:11",
        created_at: "2026-05-11 01:56:11",
        id: 1,
      },
      App\Models\Course {#7688
        name: "Landscaper Mastery",
        teacher_id: 1,
        updated_at: "2026-05-11 01:56:11",
        created_at: "2026-05-11 01:56:11",
        id: 2,
      },
      App\Models\Course {#7701
        name: "Law Enforcement Teacher Mastery",
        teacher_id: 1,
        updated_at: "2026-05-11 01:56:11",
        created_at: "2026-05-11 01:56:11",
        id: 3,
      },
    ],
  }
```

---

## Teste do Relacionamento

```php
$teacher->courses->pluck('name');

= Illuminate\Support\Collection {#7135
    all: [
      "Glass Cutting Machine Operator Mastery",
      "Landscaper Mastery",
      "Law Enforcement Teacher Mastery",
    ],
  }
```

---

# Tarefa C — Inscrições e Notas (Relacionamento N:N)

## Objetivo

- Criar 2 alunos e 2 cursos.
- Inscrever alunos em cursos utilizando relacionamento many-to-many.
- Associar notas através da tabela pivot.
- Validar o acesso aos dados da pivot.

---

## Código Utilizado

```php
$students = \App\Models\Student::factory(2)->create();

$courses = \App\Models\Course::factory(2)->create([
    'teacher_id' => $teacher->id,
]);

$student = \App\Models\Student::find(2);
$student->courses()->sync([
    4 => ['grade' => 9.5],
    5 => ['grade' => 7.0],
]);

$student = \App\Models\Student::find(3);
$student->courses()->sync([
    4 => ['grade' => 10], 
]);

$student = \App\Models\Student::find(2);
$student->courses->first()->pivot->grade;
```

---

## Criação dos Alunos e Cursos

```php
$students = \App\Models\Student::factory(2)->create();

= Illuminate\Database\Eloquent\Collection {#7721
    all: [
      App\Models\Student {#7719
        name: "Maiya Walker",
        updated_at: "2026-05-11 02:01:14",
        created_at: "2026-05-11 02:01:14",
        id: 2,
      },
      App\Models\Student {#7720
        name: "Isabella Roob Sr.",
        updated_at: "2026-05-11 02:01:14",
        created_at: "2026-05-11 02:01:14",
        id: 3,
      },
    ],
  }

$courses = \App\Models\Course::factory(2)->create([
    'teacher_id' => $teacher->id,
]);

= Illuminate\Database\Eloquent\Collection {#7158
    all: [
      App\Models\Course {#7165
        name: "Food Tobacco Roasting Mastery",
        teacher_id: 1,
        updated_at: "2026-05-11 02:02:00",
        created_at: "2026-05-11 02:02:00",
        id: 4,
      },
      App\Models\Course {#7637
        name: "Metal Worker Mastery",
        teacher_id: 1,
        updated_at: "2026-05-11 02:02:00",
        created_at: "2026-05-11 02:02:00",
        id: 5,
      },
    ],
  }
```

---

## Inscrição dos Alunos

### Aluno 1
```php
$student = \App\Models\Student::find(2);

= App\Models\Student {#6403
    id: 2,
    name: "Maiya Walker",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

$student->courses()->sync([
    4 => ['grade' => 9.5],
    5 => ['grade' => 7.0],
]);

= [
    "attached" => [
      4,
      5,
    ],
    "detached" => [],
    "updated" => [],
  ]
```

### Aluno 2
```php
$student = \App\Models\Student::find(3);

= App\Models\Student {#7707
    id: 3,
    name: "Isabella Roob Sr.",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

$student->courses()->sync([
    4 => ['grade' => 10],
]);

= [
    "attached" => [
      4,
    ],
    "detached" => [],
    "updated" => [],
  ]
```

---

## Teste da Nota na Pivot

```php
$student = \App\Models\Student::find(2);

= App\Models\Student {#7716
    id: 2,
    name: "Maiya Walker",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

$student->courses->first()->pivot->grade;

= 9.5
```