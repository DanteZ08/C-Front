
# Front office

Customer dashboard


## Features

Each logged customer will be presented with the consultant list.

There is a button for each consultant used for creating an appointment. If the consultant is not avaiable, that button will be disabled.

If the consultant is avaiable, the button will be enabled.

This system generates random dates in (H:i) format, then interogates the api endpoint until a positive result. 

Customers are required to login/register.


## Middlewares used

- Auth (Illuminate\Support\Facades\Auth)
- Throttle

## Installation


```bash
  git clone https://github.com/DanteZ08/C-Front.git
  composer install 
  php artisan serve
```
For ```php artisan serve``` please use different ports or hosts

## UML Diagram

It is present in the project as a page, routed in:
```bash
  [URL]/uml
```
## Database

Present in the project's root folder: 
```
calendar.sql
```
