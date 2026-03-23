# newspaper-time-machine

0. set working directory
1. rename screenshots
2. run tesseract 
3. run ocr
4. run merge
5. now I can copy this file for a final edit
6. Use LLM for the final edit
7. Publish to HTML
8. Deploy

## First remove all spaces from filenames

```
python3 remove_spaces_from_filenames.sh
```

Tesseract does not pick up on paragraph breaks so these ill need to re-added

https://britishnewspaperarchive.co.uk/viewer/bl/0000060/18450804/021/0004

Turn all the images into text at img/text/1844/mercury similarly named: 

```
./process /img/1844/mercury
```

Process runs tesseract and the post_processing.py script which simply does some common word replacements. 

Remove hyphenation marks at the end of lines:

```
./dehyphenate /img/1844/mercury/Screenshot 2026-03-22 at 17.20.24.txt
```

concatenate all text files under mercury.txt into a merged.txt

```
./merge /img/1844/mercury
```
