CREATE TABLE tx_secrets_domain_model_secret (
	beschreibung text NOT NULL DEFAULT '',
	kunde varchar(255) NOT NULL DEFAULT '',
	secret varchar(255) NOT NULL DEFAULT '',
	secret_key varchar(255) NOT NULL DEFAULT ''
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder