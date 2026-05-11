# 📚 Course Management — Eloquent Avançado

> **Exercício 01 — Programação Web III | ETEC da Zona Leste**  
> Atividade prática de Gestão de Relacionamentos com Laravel Tinker e Eloquent ORM.

---

## 👤 Autor

| Campo | Info |
|---|---|
| **Nome** | Wallex André Adriano dos Santos |
| **Curso** | Técnico em Desenvolvimento de Sistemas |
| **Matéria** | Programação Web III — Grupo B |
| **Professor** | Salomão Santana do Nascimento |
| **Instituição** | ETEC da Zona Leste |

---

## 🗂️ Sobre o Projeto

Sistema de gestão de cursos desenvolvido para demonstrar o uso de **relacionamentos Eloquent ORM** no Laravel, cobrindo os três tipos fundamentais:

| Tipo | Entidades |
|---|---|
| **1:1** — Um para Um | `Student` → `StudentCard` |
| **1:N** — Um para Muitos | `Teacher` → `Course` |
| **N:N** — Muitos para Muitos | `Student` ↔ `Course` (com nota na pivot) |

---

## 🏗️ Estrutura do Banco de Dados

```
students
├── id
├── name
└── timestamps

student_cards
├── id
├── code (unique)
├── student_id (FK → students)
└── timestamps

teachers
├── id
├── name
└── timestamps

courses
├── id
├── name
├── teacher_id (FK → teachers)
└── timestamps

course_student  ← tabela pivot
├── student_id (FK → students)
├── course_id  (FK → courses)
├── grade
└── timestamps
```

---

## ⚙️ Instalação

> Este exercício está disponível na branch `aula11`.

```bash
# 1. Clonar o repositório
git clone https://github.com/Wallex-Andre/pw3-laravel.git

# 2. Entrar na pasta do projeto
cd gestao-cursos

# 3. Acessar a branch da atividade
git checkout aula11

# 4. Instalar dependências
composer install

# 5. Configurar o ambiente
cp .env.example .env
php artisan key:generate

# 6. Rodar as migrations
php artisan migrate

# 7. Abrir o Tinker
php artisan tinker

---

## 🧩 Models e Relacionamentos

### Student
```php
// Relacionamento 1:1
public function studentCard() {
    return $this->hasOne(StudentCard::class);
}

// Relacionamento N:N
public function courses() {
    return $this->belongsToMany(Course::class)
                ->withPivot('grade')
                ->withTimestamps();
}
```

### StudentCard
```php
public function student() {
    return $this->belongsTo(Student::class);
}
```

### Teacher
```php
// Relacionamento 1:N
public function courses() {
    return $this->hasMany(Course::class);
}
```

### Course
```php
public function teacher() {
    return $this->belongsTo(Teacher::class);
}

public function students() {
    return $this->belongsToMany(Student::class)
                ->withPivot('grade')
                ->withTimestamps();
}
```

---

## 🧪 Tarefas — Tinker

---

### ✅ Tarefa A — Identidade Estudantil (1:1)

**Objetivo:** Criar um `Student` via factory, associar um `StudentCard` manualmente e validar o relacionamento `hasOne`.

#### Código utilizado

```php
$student = \App\Models\Student::factory()->create();

$student->studentCard()->create([
    'code' => 'STU-15423',
]);

$student->studentCard->code;
```

#### Criação do Aluno

```
$student = \App\Models\Student::factory()->create();

= App\Models\Student {#6471
    name: "Trace Kuhic",
    updated_at: "2026-05-11 00:55:10",
    created_at: "2026-05-11 00:55:10",
    id: 1,
  }
```

> 📸 **Print — Criação do Student no Tinker**  
> ![Criação do Student](prints/Tarefa%20A/1.png)

---

#### Criação do Cartão Estudantil

```
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

> 📸 **Print — Criação do StudentCard vinculado ao aluno**  
> ![Criação do StudentCard](prints/Tarefa%20A/2.png)

---

#### Teste do Relacionamento

```
$student->studentCard->code;

= "STU-15423"
```

> 📸 **Print — Teste do relacionamento hasOne**  
> ![Teste hasOne](prints/Tarefa%20A/3.png)

---

### ✅ Tarefa B — Grade Escolar (1:N)

**Objetivo:** Criar um `Teacher` chamado "Mestre Laravel", gerar 3 `Course` via factory vinculados a ele e validar o relacionamento `hasMany` com `pluck`.

#### Código utilizado

```php
$teacher = \App\Models\Teacher::create(['name' => 'Mestre Laravel']);

$courses = \App\Models\Course::factory(3)->create([
    'teacher_id' => $teacher->id,
]);

$teacher->courses->pluck('name');
```

#### Criação do Professor

```
$teacher = \App\Models\Teacher::create(['name' => 'Mestre Laravel']);

= App\Models\Teacher {#7701
    name: "Mestre Laravel",
    updated_at: "2026-05-11 01:44:05",
    created_at: "2026-05-11 01:44:05",
    id: 1,
  }
```

> 📸 **Print — Criação do Teacher**  
> ![Criação do Teacher](prints/Tarefa%20B/1.png)

---

#### Criação dos Cursos

```
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

> 📸 **Print — Criação dos 3 Courses via factory**  
> ![Criação dos Courses](prints/Tarefa%20B/2.png)

---

#### Teste do Relacionamento

```
$teacher->courses->pluck('name');

= Illuminate\Support\Collection {#7135
    all: [
      "Glass Cutting Machine Operator Mastery",
      "Landscaper Mastery",
      "Law Enforcement Teacher Mastery",
    ],
  }
```

> 📸 **Print — Teste do relacionamento hasMany com pluck**  
> ![Teste hasMany](prints/Tarefa%20B/3.png)

---

### ✅ Tarefa C — Inscrições e Notas (N:N)

**Objetivo:** Criar 2 alunos e 2 cursos, inscrever o Aluno 1 nos dois cursos com notas via `sync()`, inscrever o Aluno 2 apenas no primeiro curso e verificar a nota na tabela pivot.

#### Código utilizado

```php
$students = \App\Models\Student::factory(2)->create();

$courses = \App\Models\Course::factory(2)->create([
    'teacher_id' => $teacher->id,
]);

// Aluno 1 — dois cursos com notas
$student = \App\Models\Student::find(2);
$student->courses()->sync([
    4 => ['grade' => 9.5],
    5 => ['grade' => 7.0],
]);

// Aluno 2 — apenas o primeiro curso
$student = \App\Models\Student::find(3);
$student->courses()->sync([
    4 => ['grade' => 10],
]);

// Teste — nota na pivot
$student = \App\Models\Student::find(2);
$student->courses->first()->pivot->grade;
```

#### Criação dos Alunos e Cursos

```
= Illuminate\Database\Eloquent\Collection
    all: [
      App\Models\Student {#7719  name: "Maiya Walker",      id: 2 },
      App\Models\Student {#7720  name: "Isabella Roob Sr.", id: 3 },
    ]

    App\Models\Course {#7165  name: "Food Tobacco Roasting Mastery", id: 4 },
    App\Models\Course {#7637  name: "Metal Worker Mastery",          id: 5 },
```

> 📸 **Print — Criação dos alunos e cursos**  
> ![Criação de alunos e cursos](prints/Tarefa%20C/1.png)

---

#### Inscrição — Aluno 1 (Maiya Walker)

```
$student->courses()->sync([
    4 => ['grade' => 9.5],
    5 => ['grade' => 7.0],
]);

= [
    "attached" => [4, 5],
    "detached" => [],
    "updated"  => [],
  ]
```

> 📸 **Print — sync() do Aluno 1 nos dois cursos**  
> ![sync Aluno 1](prints/Tarefa%20C/2.png)

---

#### Inscrição — Aluno 2 (Isabella Roob Sr.)

```
$student->courses()->sync([
    4 => ['grade' => 10],
]);

= [
    "attached" => [4],
    "detached" => [],
    "updated"  => [],
  ]
```

> 📸 **Print — sync() do Aluno 2 no primeiro curso**  
> ![sync Aluno 2](prints/Tarefa%20C/3.png)

---

#### Teste da Nota na Pivot

```
$student->courses->first()->pivot->grade;

= 9.5
```

> 📸 **Print — pivot->grade retornando 9.5**  
> ![Teste pivot](prints/Tarefa%20C/4.png)

---

## 💡 Conceitos Aplicados

| Conceito | Descrição |
|---|---|
| `hasOne` | Um Student possui um StudentCard |
| `belongsTo` | StudentCard e Course pertencem à entidade pai |
| `hasMany` | Um Teacher ministra muitos Courses |
| `belongsToMany` | Student e Course — relacionamento N:N |
| `withPivot('grade')` | Acesso à coluna extra da tabela pivot |
| `sync()` | Sincroniza inscrições removendo, mantendo e inserindo |
| Eager Loading | `with()` resolve o problema N+1 de queries |
| `onDelete('cascade')` | Integridade referencial nas FKs |

---

*ETEC da Zona Leste — 2026*