# Basis-Image
FROM mysql:latest

# Pakete installieren
RUN microdnf install nano && microdnf clean all
