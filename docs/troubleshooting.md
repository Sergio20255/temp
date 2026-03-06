# Troubleshooting

## Conversion fails
- Verify binary exists (`command -v ffmpeg`, etc.).
- Check process permissions for storage folders.
- Validate file extension support in `ConversionMap`.

## Queue not processing
- Confirm Redis host/port in `.env`.
- Ensure worker is running.
- Check PHP CLI uses same `.env` context.

## Large files timeout
- Increase `upload_max_filesize`, `post_max_size`, and execution limits.
- Offload heavy jobs to dedicated queue workers.
