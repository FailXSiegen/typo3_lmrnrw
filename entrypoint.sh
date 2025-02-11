#!/bin/bash

echo "Debugging SSH setup..."

# Überprüfe den Inhalt von /tmp/.ssh
echo "Contents of /tmp/.ssh:"
ls -la /tmp/.ssh

# Kopiere SSH-Dateien mit korrekten Berechtigungen
mkdir -p /root/.ssh
cp -rv /tmp/.ssh/* /root/.ssh/ || echo "Failed to copy SSH files"

# Überprüfe den Inhalt von /root/.ssh nach dem Kopieren
echo "Contents of /root/.ssh after copying:"
ls -la /root/.ssh

chown -R root:root /root/.ssh
chmod 700 /root/.ssh
chmod 600 /root/.ssh/id_rsa || echo "Failed to set permissions on id_rsa"
chmod 644 /root/.ssh/id_rsa.pub || echo "Failed to set permissions on id_rsa.pub"

# Erstelle oder aktualisiere SSH-Konfiguration
cat > /root/.ssh/config <<EOL
Host *
  IdentityFile /root/.ssh/id_rsa
  StrictHostKeyChecking no
  UserKnownHostsFile /dev/null
EOL

chmod 600 /root/.ssh/config

# Starte SSH-Agent und füge den Schlüssel hinzu
eval $(ssh-agent -s)
ssh-add /root/.ssh/id_rsa || echo "Failed to add SSH key to agent"

echo "SSH setup complete"

# Führe den ursprünglichen Docker-Entrypoint aus
exec "$@"