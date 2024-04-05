#!/bin/bash

# Accept table name and fields as arguments
table_name=$1
fields=$2

# Generate model
php artisan make:model $table_name

# Generate migration file
# migration_filename=$(date +"%Y_%m_%d_%H%M%S")_create_${table_name}_table
# php artisan make:migration create_${table_name}_table --create=${table_name}
migration_filename=$(find database/migrations -type f -name "*create_${table_name}_table.php" | tail -n 1)

# Parse fields and generate migration code
field_definitions=""
IFS=',' read -ra field_array <<< "$fields"
for field in "${field_array[@]}"; do
  field_name=$(echo "$field" | cut -d ':' -f 1)
  field_type=$(echo "$field" | cut -d ':' -f 2)
  field_options=$(echo "$field" | cut -d ':' -f 3-) # Optional options

  # Construct migration code snippet
  field_code="\$table->$field_type('$field_name')"
  if [[ -n "$field_options" ]]; then
    field_code="$field_code->$field_options"
  fi
  field_code="$field_code;"

  field_definitions="$field_definitions$field_code\n"
done

# Replace placeholder in migration file
awk -v repl="$field_definitions" '/\/\/ fields_placeholder/ { print repl; next } 1' "${migration_filename}" > temp && mv temp "${migration_filename}"

# Generate controller
php artisan make:controller ${table_name}Controller --resource

echo "Model, Migration, and Controller for ${table_name} created successfully!"