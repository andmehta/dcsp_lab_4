# dcsp_lab_4
Lab designed for validating user input in an HTML form with php. 

## testing tables

### Name
| input    | expected output | actual output |
|----------|-----------------|---------------|
| `andrew` | no err          | no err        |
| `a!`     | err             | __no err__    |
| `qwer\`  | err             | __no err__    | 


### Email __TODO__ have this not err on first load
| input             | expected output | actual output |
|-------------------|-----------------|---------------|
| `aaa`             | err             | err           |
| `a.com`           | err             | err           |
| `test@domain.com` | no err          | no err        | 

### Agree __TODO__ have this not err on first load
| input     | expected output | actual output |
|-----------|-----------------|---------------|
| checked   | no err          | no err        |
| unchecked | err             | err           |

### Current GPA
| input | expected output | actual output |
|-------|-----------------|---------------|
| `-1`  | err             | err           |
| `0.0` | no err          | no err        |
| `1.0` | no err          | no err        | 
| `4.0` | no err          | no err        |
| `4.2` | err             | err           |

### Current Total Credits
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-0.1` | err             | err           |
| `-1`   | err             | err           |
| `0`    | no err          | no err        | 
| `1`    | no err          | no err        |
| `0.1`  | err             | err           |

### I am taking __TODO__ have this not err on first load
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-0.1` | err             | err           |
| `-1`   | err             | err           |
| `0`    | no err          | __err__       | 
| `1`    | no err          | no err        |
| `0.1`  | err             | err           |

### Raise my GPA
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-1`   | err             | err           |
| `0`    | no err          | no err        | 
| `1`    | no err          | no err        |
