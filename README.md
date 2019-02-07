Para ejecutar este Crud debemos tener Pgsql, apache2 y php instalado
adicionalmente debemos tener una BD creada 
```
CREATE DATABASE prueba;

CREATE USER prueba PASSWORD 'prueba';

GRANT ALL PRIVILEGES ON DATABASE prueba to prueba;

ALTER DATABASE prueba OWNER TO prueba;

CREATE TABLE "users" (
"id" serial NOT NULL,
"username" varchar(100) COLLATE "default",
"password" varchar(100) COLLATE "default",
"created_at" date DEFAULT ('now'::text)::date NOT NULL
)
WITH (OIDS=FALSE);

ALTER TABLE "users" ADD PRIMARY KEY ("id");

GRANT ALL PRIVILEGES ON TABLE users TO prueba;

GRANT ALL PRIVILEGES ON ALL TABLES prueba TO prueba;

ALTER DEFAULT PRIVILEGES IN DATABASE prueba 
    GRANT SELECT, INSERT, UPDATE, DELETE ON TABLES TO prueba;

GRANT SELECT, INSERT, UPDATE, DELETE ON users TO prueba;

GRANT USAGE, SELECT ON SEQUENCE users_id_seq TO prueba;

```


