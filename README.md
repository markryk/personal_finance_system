# Personal Finance System
Sistema pessoal de finanças

## Tecnologias utilizadas


## Como rodar o projeto
```
git clone https://github.com/markryk/personal_finance_system.git
cd personal_finance_system
```

### Configuração do BD

Copie o arquivo .env.example para .env e edite-o com seus dados

Execute
```
php artisan migrate
```

```
composer install
php artisan key:generate
php artisan serve
```

## Estrutura das pastas
```
app
├── Models
│   ├── Category.php
│   ├── Income.php
│   └── Expense.php

├── Http
│   ├── Controllers
│   │   ├── CategoryController.php
│   │   ├── ExpenseController.php
│   │   ├── IncomeController.php
│   │
│   └── Requests
│       ├── StoreCategoryRequest.php
│       ├── StoreExpenseRequest.php
│       ├── StoreIncomeRequest.php

├── Services
│   └── FinanceService.php

resources
└── views
    ├── categories
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── edit.blade.php
    │
    ├── incomes
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── edit.blade.php
    │
    └── expenses
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php
```