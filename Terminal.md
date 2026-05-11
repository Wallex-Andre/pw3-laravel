Microsoft Windows [versão 10.0.26200.8328]
(c) Microsoft Corporation. Todos os direitos reservados.

C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan make:model Student -mf

   INFO  Model [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\app\Models\Student.php] created successfully.  

   INFO  Factory [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\factories\StudentFactory.php] created successfully.  

   INFO  Migration [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\migrations\2026_05_11_002419_create_students_table.php] created successfully.  


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>
C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan make:model StudentCard -mf

   INFO  Model [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\app\Models\StudentCard.php] created successfully.  

   INFO  Factory [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\factories\StudentCardFactory.php] created successfully.  

   INFO  Migration [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\migrations\2026_05_11_002441_create_student_cards_table.php] created successfully.  


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan make:model Teacher -mf

   INFO  Model [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\app\Models\Teacher.php] created successfully.  

   INFO  Factory [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\factories\TeacherFactory.php] created successfully.  

   INFO  Migration [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\migrations\2026_05_11_002446_create_teachers_table.php] created successfully.  


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan make:model Course -mf

   INFO  Model [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\app\Models\Course.php] created successfully.  

   INFO  Factory [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\factories\CourseFactory.php] created successfully.  

   INFO  Migration [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\migrations\2026_05_11_002452_create_courses_table.php] created successfully.  


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan make:migration create_course_student_table

   INFO  Migration [C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos\database\migrations\2026_05_11_002458_create_course_student_table.php] created successfully.  

                                                                               
C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan migrate

   INFO  Running migrations.  

  2026_05_11_002419_create_students_table ......................................................................... 158.38ms DONE
  2026_05_11_002441_create_student_cards_table ..................................................................... 83.01ms DONE
  2026_05_11_002446_create_teachers_table ........................................................................... 3.88ms DONE
  2026_05_11_002452_create_courses_table ............................................................................ 4.13ms DONE
  2026_05_11_002458_create_course_student_table ..................................................................... 4.13ms DONE


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan tinker
Psy Shell v0.12.22 (PHP 8.4.0 — cli) by Justin Hileman
New PHP manual is available (latest: 3.0.5). Update with `doc --update-manual`

> $student = \App\Models\Student::factory()->create();

= App\Models\Student {#6471
    name: "Trace Kuhic",
    updated_at: "2026-05-11 00:55:10",
    created_at: "2026-05-11 00:55:10",
    id: 1,
  }

> $student->studentCard()->create([
.     'code' => 'STU-15423',
. ]);                              

= App\Models\StudentCard {#7663
    code: "STU-15423",
    student_id: 1,
    updated_at: "2026-05-11 01:02:05",
    created_at: "2026-05-11 01:02:05",
    id: 1,
  }

> $student->studentCard->code;

= "STU-15423"

> $teacher = \App\Models\Teacher::create(['name' => 'Mestre Laravel',]);

= App\Models\Teacher {#7701
    name: "Mestre Laravel",
    updated_at: "2026-05-11 01:44:05",
    created_at: "2026-05-11 01:44:05",
    id: 1,
  }

> \App\Models\Course::factory(3)->create([
.     'teacher_id' => $teacher->id,
. ]);

   BadMethodCallException  Method Database\Factories\TeacherFactory::factory does not exist.

> $courses = \App\Models\Course::factory(3)->create([
.     'teacher_id' => $teacher->id,
. ]);

   BadMethodCallException  Method Database\Factories\TeacherFactory::factory does not exist.

> eit

   Error  Undefined constant "eit".

> exit

   INFO  Goodbye.


C:\Users\acer\Desktop\Etec 2026\PW3\Laravel\gestao-cursos>php artisan tinker
Psy Shell v0.12.22 (PHP 8.4.0 — cli) by Justin Hileman
New PHP manual is available (latest: 3.0.5). Update with `doc --update-manual`

> $teacher = \App\Models\Teacher::find(1);

= App\Models\Teacher {#7115
    id: 1,
    name: "Mestre Laravel",
    created_at: "2026-05-11 01:44:05",
    updated_at: "2026-05-11 01:44:05",
  }

> $courses = \App\Models\Course::factory(3)->create([
.     'teacher_id' => $teacher->id,
. ]);

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

> $teacher->courses->pluck('name');

= Illuminate\Support\Collection {#7135
    all: [
      "Glass Cutting Machine Operator Mastery",
      "Landscaper Mastery",
      "Law Enforcement Teacher Mastery",
    ],
  }

> $student = \App\Models\Student::factory(2)->create();

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

> $courses = \App\Models\Course::factory(2)->create([
. .     'teacher_id' => $teacher->id,

   PARSE ERROR  PHP Parse error: Syntax error, unexpected '.', expecting ',' or ']' or ')' in vendor\psy\psysh\src\Exception\ParseErrorException.php on line 44.

> $courses = \App\Models\Course::factory(2)->create([
. 'teacher_id' => $teacher->id,                        
. ]);

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

> $student= \App\Models\Student::find(2);

= App\Models\Student {#6403
    id: 2,
    name: "Maiya Walker",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

> $student->courses()->sync([
.     4 => ['grade' => 9.5],
.     5 => ['grade' => 7.0],
. ]);

= [
    "attached" => [
      4,
      5,
    ],
    "detached" => [],
    "updated" => [],
  ]

> $student= \App\Models\Student::find(3);

= App\Models\Student {#7707
    id: 3,
    name: "Isabella Roob Sr.",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

> $student->courses()->sync([
.     4 => ['grade' => 10], 
. ]);

= [
    "attached" => [
      4,
    ],
    "detached" => [],
    "updated" => [],
  ]

> $student = \App\Models\Student::find(2);

= App\Models\Student {#7716
    id: 2,
    name: "Maiya Walker",
    created_at: "2026-05-11 02:01:14",
    updated_at: "2026-05-11 02:01:14",
  }

> $student->courses->first()->pivot->grade;

= 9.5

> 