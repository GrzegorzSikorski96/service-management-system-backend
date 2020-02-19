# Aplikacja do zarządzania siecią serwisów

## Instalacja zależności polecenie:
```
composer install
```

##Uruchomienie aplikacji

Aby poprawnie uruchomić aplikację należy najpierw 
utworzyć plik .env na podstawie pliku .env.example 
oraz uzupełnić go odpowiednimi wartościami. Następnie należy użyć następujących poleceń:


### Generowanie klucza aplikacji
```
php artisan key:generate
```

### Generowanie klucza JWT:
```
php artisan JWT:secret
```

### Utworzenie tabel w bazie danych na podstawie migracji:
```
php artisan migrate:refresh
```

