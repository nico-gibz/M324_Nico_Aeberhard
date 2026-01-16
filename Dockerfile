# Basis-Image
FROM mysql:latest

# Pakete installieren
RUN microdnf install nano && microdnf clean all

COPY init.sql /docker-entrypoint-initdb.d/