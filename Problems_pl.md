## Problemy

Opis zadania

Chcę napisać aplikację w Laravelu, która będzie 
- wyświetlać listę użytkowników i napisanych przez nich postów
- udostępniać API dla postów
- umożliwiać rejestrację i logowanie zwykłego użytkownika

Użytkownik może być administratorem lub zwykłym użytkownikem ( dodałem pole `is_admin` do tabeli `users` ).

Dla ułatwienia testowania wpisałem do tabeli users dziesięciu użytkowników, z których pięciu jest adminami ( ci o nieparzystch user_id ) a pozostali - zwykłymi użytkownikami. Utworzyłem też 20 postów za pomocą fabryki i polecenia  

```
php artisan migrate --seed
```

Zwykły użytkownik może edytować tylko swój post, a admin - każdy post.
Tylko admin może usuwać posty.

Jako przykład wziąłem formularz do tworzenia ticketów w jednej z kilku predefiniowanych kategorii.

[Laravel Vue Form Demo](https://github.com/LaravelDaily/Laravel-Vue-Form-Demo "Laravel Form transformed from Blade into a Vue.js component")  

W tym przykładzie:
- ticket nie miał przypisanego użytkownika, tylko kategorię, jako klucz obcy `category_id`.
- jest używany  "php": "^7.2.5" i "laravel/framework": "^7.0".

Zgłosiłem [poprawkę do Laravel Vue Form Demo](https://github.com/LaravelDaily/Laravel-Vue-Form-Demo/commit/088852e2330f050655eba6d52e77c7ad0ac79514) aby wypełnić tabelę kategorii.

Ja natomiast założyłem, że każdy post jest przez kogoś napisany, ma więc swój `user_id`.  
Używam najnowszego Laravela 9.2 i php 8.1.

W Postmanie sprawdziłem działanie edycji postu dla zwykłego użytkownika i dla admina.

Nie działa jednak tworzenie postu. Jest błąd autentykacji 401. Nie wiem dlaczego, skoro użytkownik jest zalogowany.
Poza tym dostaję czasem Invalid CSRF Token.
Proszę o pomoc w testowaniu.

