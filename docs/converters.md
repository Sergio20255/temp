# Converter Configuration

## Mapping
Conversion pairs are defined in:
- `app/Services/Conversion/ConversionMap.php`

## Processing Engines
- **FFmpeg**: video/audio
- **ImageMagick**: image formats
- **LibreOffice headless**: office documents
- **Pandoc**: eBooks / markup conversions

## Extending Formats
1. Add pair to `ConversionMap`.
2. Update `ConversionService::buildCommand` if new tool required.
3. Add SEO route (or dynamic route generator).
4. Add UI entries in homepage/tool pages.
