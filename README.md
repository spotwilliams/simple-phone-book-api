# Simple Phone Book API
The present API is useful to store contacts. Every contact have:
* First name (required).
* Surnames (required).
* Phones: N telephones can be stored (not required but when provided must be a valid North America, Europe and most Asian and Middle East countries).
* Email: N Emails can be saved (not required but when provided must be a valid email address). 

## List of routes

#### Authorization

To get access to store contact, must to require access to your contacts library. 
For this, it's necessary to call to `/authorize` method (POST). This route will give to you
a token which will be the identifier for your Phone book.

To perform any of the CRUD operations, must to provide a HEADER with the token (`token=ABCAKDKASI1231231234`)

#### Create contact

    Route: /contacts (POST)

Payload:
```json
{
	"firstName": "John",
	"surName": "Doe",
	"emails": [
		"jdoe@mail.com"
	],
	"phones": [
		"(555)555-5555"
	]
}

```

#### Update contact
    Route: /contacts/{id} (PUT)

Payload:
```json
{
	"firstName": "John",
	"surName": "Doe",
	"emails": [
		"jdoe@mail.com"
	],
	"phones": [
		"(555)555-5555"
	]
}

```

#### Delete contact

    Route: /contacts/{id} (DELETE)

#### Read contact (single)

    Route: /contacts/{id} (GET)

#### Read contact (list)
    
    Route: /contacts/ (GET)
