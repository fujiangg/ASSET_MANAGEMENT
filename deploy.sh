#!/bin/bash

echo "Building Docker images..."

# Build SuperAdmin image
docker build -f Dockerfile.superadmin -t superadmin:latest .

# Build AMS image  
docker build -f Dockerfile.ams -t ams:latest .

echo "Applying Kubernetes manifests..."

# Apply namespace
kubectl apply -f k8s/namespace.yaml

# Apply MySQL
kubectl apply -f k8s/mysql.yaml

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
kubectl wait --for=condition=ready pod -l app=mysql -n asset-management --timeout=300s

# Apply applications
kubectl apply -f k8s/superadmin.yaml
kubectl apply -f k8s/ams.yaml

# Apply ingress
kubectl apply -f k8s/ingress.yaml

echo "Deployment complete!"
echo "Add these entries to your /etc/hosts file:"
echo "127.0.0.1 superadmin.local"
echo "127.0.0.1 ams.local"