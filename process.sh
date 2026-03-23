#!/bin/bash

# Usage: ./process.sh <input_image_file_or_directory>

input_path="$1"

if [ -d "$input_path" ]; then
    echo "Input is a directory. Processing all .png files..."
    
    for input_file in "$input_path"/*.png; do
        if [ -f "$input_file" ]; then
            echo "Processing file: $input_file"
            
            input_dir=$(dirname "$input_file")
            base_filename=$(basename "$input_file" .png)

            # Output next to original image
            output_file="$input_dir/${base_filename}.txt"

            # Run Tesseract OCR
            tesseract "$input_file" tmp

            # Post-processing
            python3 post_processing.py tmp.txt > "$output_file"

            rm tmp.txt

            echo "Processing complete. Output saved to $output_file"
        fi
    done
elif [ -f "$input_path" ]; then
    echo "Input is a file. Processing: $input_path"

    input_dir=$(dirname "$input_path")
    base_filename=$(basename "$input_path" .png)
    output_file="$input_dir/${base_filename}.txt"

    tesseract "$input_path" tmp
    python3 post_processing.py tmp.txt > "$output_file"
    rm tmp.txt

    echo "Processing complete. Output saved to $output_file"
else
    echo "Error: $input_path is neither a valid file nor a directory."
fi

# After processing all files, merge the resulting .txt files

# After processing all files, merge the resulting .txt files
echo "Merging all processed text files in $input_path..."

./merge-text.sh "$input_path" 