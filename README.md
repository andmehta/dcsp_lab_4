# dcsp_lab_4
Lab designed for validating user input in an HTML form with php. 

## testing tables

### Name
| input    | expected output | actual output |
|----------|-----------------|---------------|
| `andrew` | no err          |               |
| `a!`     | err             |               |
| `qwer\`  | err             |               | 


### Email
| input             | expected output | actual output |
|-------------------|-----------------|---------------|
| `aaa`             | err             |               |
| `a.com`           | err             |               |
| `test@domain.com` | no err          |               | 

### Agree 
| input     | expected output | actual output |
|-----------|-----------------|---------------|
| checked   | no err          | no err        |
| unchecked | err             | err           |

### Current GPA
| input | expected output | actual output |
|-------|-----------------|---------------|
| `-1`  | err             |               |
| `0.0` | no err          |               |
| `1.0` | no err          |               | 
| `4.0` | no err          |               |
| `4.2` | err             |               |

### Current Total Credits
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-0.1` | err             |               |
| `-1`   | err             |               |
| `0`    | no err          |               | 
| `1`    | no err          |               |
| `0.1`  | err             |               |

### I am taking 
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-0.1` | err             |               |
| `-1`   | err             |               |
| `0`    | no err          |               | 
| `1`    | no err          |               |
| `0.1`  | err             |               |

### Raise my GPA
| input  | expected output | actual output |
|--------|-----------------|---------------|
| `-1`   | err             |               |
| `0`    | no err          |               | 
| `1`    | no err          |               |
