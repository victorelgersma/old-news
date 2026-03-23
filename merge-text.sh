#!/bin/bash

# Usage: ./merged.sh <directory> [output_file]

dir="$1"
output_file="${2:-merged.txt}"  # default to merged.txt if no output provided

if [ ! -d "$dir" ]; then
    exit 1
fi

# Truncate or create the output file
> "$output_file"

# Concatenate all .txt files in the directory, sorted alphabetically, safely
find "$dir" -maxdepth 1 -type f -name "*.txt" | sort | while IFS= read -r f; do
    cat "$f" >> "$output_file"
    echo "" >> "$output_file"  # optional newline between files
done
