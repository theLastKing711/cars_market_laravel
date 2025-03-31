<?php
/* @noinspection ALL */
// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for Laravel, to provide autocomplete information to your IDE
 * Generated for Laravel 11.44.2.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */
namespace Barryvdh\Debugbar\Facades {
    /**
     *
     *
     * @method static void alert(mixed $message)
     * @method static void critical(mixed $message)
     * @method static void debug(mixed $message)
     * @method static void emergency(mixed $message)
     * @method static void error(mixed $message)
     * @method static void info(mixed $message)
     * @method static void log(mixed $message)
     * @method static void notice(mixed $message)
     * @method static void warning(mixed $message)
     * @see \Barryvdh\Debugbar\LaravelDebugbar
     */
    class Debugbar {
        /**
         * Returns the HTTP driver
         *
         * If no http driver where defined, a PhpHttpDriver is automatically created
         *
         * @return \DebugBar\HttpDriverInterface
         * @static
         */
        public static function getHttpDriver()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getHttpDriver();
        }

        /**
         * Enable the Debugbar and boot, if not already booted.
         *
         * @static
         */
        public static function enable()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->enable();
        }

        /**
         * Boot the debugbar (add collectors, renderer and listener)
         *
         * @static
         */
        public static function boot()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->boot();
        }

        /**
         *
         *
         * @static
         */
        public static function shouldCollect($name, $default = false)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->shouldCollect($name, $default);
        }

        /**
         * Adds a data collector
         *
         * @param \DebugBar\DataCollector\DataCollectorInterface $collector
         * @throws DebugBarException
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function addCollector($collector)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addCollector($collector);
        }

        /**
         * Handle silenced errors
         *
         * @param $level
         * @param $message
         * @param string $file
         * @param int $line
         * @param array $context
         * @throws \ErrorException
         * @static
         */
        public static function handleError($level, $message, $file = '', $line = 0, $context = [])
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->handleError($level, $message, $file, $line, $context);
        }

        /**
         * Starts a measure
         *
         * @param string $name Internal name, used to stop the measure
         * @param string $label Public name
         * @param string|null $collector
         * @static
         */
        public static function startMeasure($name, $label = null, $collector = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->startMeasure($name, $label, $collector);
        }

        /**
         * Stops a measure
         *
         * @param string $name
         * @static
         */
        public static function stopMeasure($name)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->stopMeasure($name);
        }

        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @deprecated in favor of addThrowable
         * @static
         */
        public static function addException($e)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addException($e);
        }

        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Throwable $e
         * @static
         */
        public static function addThrowable($e)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addThrowable($e);
        }

        /**
         * Returns a JavascriptRenderer for this instance
         *
         * @param string $baseUrl
         * @param string $basePath
         * @return \Barryvdh\Debugbar\JavascriptRenderer
         * @static
         */
        public static function getJavascriptRenderer($baseUrl = null, $basePath = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getJavascriptRenderer($baseUrl, $basePath);
        }

        /**
         * Modify the response and inject the debugbar (or data in headers)
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param \Symfony\Component\HttpFoundation\Response $response
         * @return \Symfony\Component\HttpFoundation\Response
         * @static
         */
        public static function modifyResponse($request, $response)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->modifyResponse($request, $response);
        }

        /**
         * Check if the Debugbar is enabled
         *
         * @return boolean
         * @static
         */
        public static function isEnabled()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isEnabled();
        }

        /**
         * Collects the data from the collectors
         *
         * @return array
         * @static
         */
        public static function collect()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->collect();
        }

        /**
         * Injects the web debug toolbar into the given Response.
         *
         * @param \Symfony\Component\HttpFoundation\Response $response A Response instance
         * Based on https://github.com/symfony/WebProfilerBundle/blob/master/EventListener/WebDebugToolbarListener.php
         * @static
         */
        public static function injectDebugbar($response)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->injectDebugbar($response);
        }

        /**
         * Checks if there is stacked data in the session
         *
         * @return boolean
         * @static
         */
        public static function hasStackedData()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->hasStackedData();
        }

        /**
         * Returns the data stacked in the session
         *
         * @param boolean $delete Whether to delete the data in the session
         * @return array
         * @static
         */
        public static function getStackedData($delete = true)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStackedData($delete);
        }

        /**
         * Disable the Debugbar
         *
         * @static
         */
        public static function disable()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->disable();
        }

        /**
         * Adds a measure
         *
         * @param string $label
         * @param float $start
         * @param float $end
         * @param array|null $params
         * @param string|null $collector
         * @static
         */
        public static function addMeasure($label, $start, $end, $params = [], $collector = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addMeasure($label, $start, $end, $params, $collector);
        }

        /**
         * Utility function to measure the execution of a Closure
         *
         * @param string $label
         * @param \Closure $closure
         * @param string|null $collector
         * @return mixed
         * @static
         */
        public static function measure($label, $closure, $collector = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->measure($label, $closure, $collector);
        }

        /**
         * Collect data in a CLI request
         *
         * @return array
         * @static
         */
        public static function collectConsole()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->collectConsole();
        }

        /**
         * Adds a message to the MessagesCollector
         *
         * A message can be anything from an object to a string
         *
         * @param mixed $message
         * @param string $label
         * @static
         */
        public static function addMessage($message, $label = 'info')
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addMessage($message, $label);
        }

        /**
         * Checks if a data collector has been added
         *
         * @param string $name
         * @return boolean
         * @static
         */
        public static function hasCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->hasCollector($name);
        }

        /**
         * Returns a data collector
         *
         * @param string $name
         * @return \DebugBar\DataCollector\DataCollectorInterface
         * @throws DebugBarException
         * @static
         */
        public static function getCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCollector($name);
        }

        /**
         * Returns an array of all data collectors
         *
         * @return array[DataCollectorInterface]
         * @static
         */
        public static function getCollectors()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCollectors();
        }

        /**
         * Sets the request id generator
         *
         * @param \DebugBar\RequestIdGeneratorInterface $generator
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setRequestIdGenerator($generator)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setRequestIdGenerator($generator);
        }

        /**
         *
         *
         * @return \DebugBar\RequestIdGeneratorInterface
         * @static
         */
        public static function getRequestIdGenerator()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getRequestIdGenerator();
        }

        /**
         * Returns the id of the current request
         *
         * @return string
         * @static
         */
        public static function getCurrentRequestId()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCurrentRequestId();
        }

        /**
         * Sets the storage backend to use to store the collected data
         *
         * @param \DebugBar\StorageInterface $storage
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStorage($storage = null)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStorage($storage);
        }

        /**
         *
         *
         * @return \DebugBar\StorageInterface
         * @static
         */
        public static function getStorage()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStorage();
        }

        /**
         * Checks if the data will be persisted
         *
         * @return boolean
         * @static
         */
        public static function isDataPersisted()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isDataPersisted();
        }

        /**
         * Sets the HTTP driver
         *
         * @param \DebugBar\HttpDriverInterface $driver
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setHttpDriver($driver)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setHttpDriver($driver);
        }

        /**
         * Returns collected data
         *
         * Will collect the data if none have been collected yet
         *
         * @return array
         * @static
         */
        public static function getData()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getData();
        }

        /**
         * Returns an array of HTTP headers containing the data
         *
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return array
         * @static
         */
        public static function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getDataAsHeaders($headerName, $maxHeaderLength, $maxTotalHeaderLength);
        }

        /**
         * Sends the data through the HTTP headers
         *
         * @param bool $useOpenHandler
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->sendDataInHeaders($useOpenHandler, $headerName, $maxHeaderLength);
        }

        /**
         * Stacks the data in the session for later rendering
         *
         * @static
         */
        public static function stackData()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->stackData();
        }

        /**
         * Sets the key to use in the $_SESSION array
         *
         * @param string $ns
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStackDataSessionNamespace($ns)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStackDataSessionNamespace($ns);
        }

        /**
         * Returns the key used in the $_SESSION array
         *
         * @return string
         * @static
         */
        public static function getStackDataSessionNamespace()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStackDataSessionNamespace();
        }

        /**
         * Sets whether to only use the session to store stacked data even
         * if a storage is enabled
         *
         * @param boolean $enabled
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStackAlwaysUseSessionStorage($enabled = true)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStackAlwaysUseSessionStorage($enabled);
        }

        /**
         * Checks if the session is always used to store stacked data
         * even if a storage is enabled
         *
         * @return boolean
         * @static
         */
        public static function isStackAlwaysUseSessionStorage()
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isStackAlwaysUseSessionStorage();
        }

        /**
         *
         *
         * @static
         */
        public static function offsetSet($key, $value)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetSet($key, $value);
        }

        /**
         *
         *
         * @static
         */
        public static function offsetGet($key)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetGet($key);
        }

        /**
         *
         *
         * @static
         */
        public static function offsetExists($key)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetExists($key);
        }

        /**
         *
         *
         * @static
         */
        public static function offsetUnset($key)
        {
            //Method inherited from \DebugBar\DebugBar
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetUnset($key);
        }

            }
    }

namespace CloudinaryLabs\CloudinaryLaravel\Facades {
    /**
     * Class Cloudinary
     *
     */
    class Cloudinary {
        /**
         * Create a Cloudinary Config Instance
         *
         * @static
         */
        public static function setCloudinaryConfig()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->setCloudinaryConfig();
        }

        /**
         * Set User Agent and Platform
         *
         * @static
         */
        public static function setUserPlatform()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->setUserPlatform();
        }

        /**
         * Set Analytics
         *
         * @static
         */
        public static function setAnalytics()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->setAnalytics();
        }

        /**
         * Create a Cloudinary Instance
         *
         * @static
         */
        public static function bootCloudinary()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->bootCloudinary();
        }

        /**
         * Expose the Cloudinary Admin Functionality
         *
         * @static
         */
        public static function admin()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->admin();
        }

        /**
         * Expose the Cloudinary Search Functionality
         *
         * @static
         */
        public static function search()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->search();
        }

        /**
         * Uploads an asset to a Cloudinary account.
         *
         * The asset can be:
         * * a local file path
         * * the actual data (byte array buffer)
         * * the Data URI (Base64 encoded), max ~60 MB (62,910,000 chars)
         * * the remote FTP, HTTP or HTTPS URL address of an existing file
         * * a private storage bucket (S3 or Google Storage) URL of a whitelisted bucket
         *
         * @param string $file The asset to upload.
         * @param array $options The optional parameters. See the upload API documentation.
         * @return \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine
         * @throws ApiError
         * @see https://cloudinary.com/documentation/image_upload_api_reference#upload_method
         * @static
         */
        public static function upload($file, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->upload($file, $options);
        }

        /**
         * Expose the Cloudinary Upload Functionality
         *
         * @static
         */
        public static function uploadApi()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->uploadApi();
        }

        /**
         * Uploads an asset to a Cloudinary account.
         *
         * The upload is not signed so an upload preset is required.
         *
         * @param string $file The asset to upload.
         * @param string $uploadPreset The name of an upload preset.
         * @param array $options The optional parameters. See the upload API documentation.
         * @return \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine
         * @throws ApiError
         * @see https://cloudinary.com/documentation/image_upload_api_reference#unsigned_upload_syntax
         * @static
         */
        public static function unsignedUpload($file, $uploadPreset, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->unsignedUpload($file, $uploadPreset, $options);
        }

        /**
         * Uploads an asset to a Cloudinary account.
         *
         * The upload is not signed so an upload preset is required.
         *
         * This is asynchronous
         *
         * @throws ApiError
         * @static
         */
        public static function unsignedUploadAsync($file, $uploadPreset, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->unsignedUploadAsync($file, $uploadPreset, $options);
        }

        /**
         *
         *
         * @return \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine
         * @throws ApiError
         * @static
         */
        public static function uploadFile($file, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->uploadFile($file, $options);
        }

        /**
         *
         *
         * @return \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine
         * @throws ApiError
         * @static
         */
        public static function uploadVideo($file, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->uploadVideo($file, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function getResponse()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getResponse();
        }

        /**
         *
         *
         * @static
         */
        public static function getAssetId()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getAssetId();
        }

        /**
         * Get the name of the file after it has been uploaded to Cloudinary
         *
         * @static
         */
        public static function getFileName()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getFileName();
        }

        /**
         * Get the public id of the file (also known as the name of the file) after it has been uploaded to Cloudinary
         *
         * @static
         */
        public static function getPublicId()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getPublicId();
        }

        /**
         * Get the name of the file before it was uploaded to Cloudinary
         *
         * @static
         */
        public static function getOriginalFileName()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getOriginalFileName();
        }

        /**
         *
         *
         * @static
         */
        public static function getVersion()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getVersion();
        }

        /**
         *
         *
         * @static
         */
        public static function getVersionId()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getVersionId();
        }

        /**
         *
         *
         * @static
         */
        public static function getSignature()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getSignature();
        }

        /**
         *
         *
         * @static
         */
        public static function getWidth()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getWidth();
        }

        /**
         *
         *
         * @static
         */
        public static function getHeight()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getHeight();
        }

        /**
         *
         *
         * @static
         */
        public static function getExtension()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getExtension();
        }

        /**
         *
         *
         * @static
         */
        public static function getFileType()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getFileType();
        }

        /**
         *
         *
         * @static
         */
        public static function getTimeUploaded()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getTimeUploaded();
        }

        /**
         *
         *
         * @static
         */
        public static function getTags()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getTags();
        }

        /**
         *
         *
         * @static
         */
        public static function getPages()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getPages();
        }

        /**
         *
         *
         * @static
         */
        public static function getReadableSize()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getReadableSize();
        }

        /**
         * Formats filesize in the way every human understands
         *
         * @return string Formatted Filesize, e.g. "113.24 MB".
         * @static
         */
        public static function getHumanReadableSize($sizeInBytes)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getHumanReadableSize($sizeInBytes);
        }

        /**
         *
         *
         * @static
         */
        public static function getSize()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getSize();
        }

        /**
         *
         *
         * @static
         */
        public static function getPlaceHolder()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getPlaceHolder();
        }

        /**
         *
         *
         * @static
         */
        public static function getPath()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getPath();
        }

        /**
         *
         *
         * @static
         */
        public static function getSecurePath()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getSecurePath();
        }

        /**
         *
         *
         * @static
         */
        public static function getPhash()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getPhash();
        }

        /**
         *
         *
         * @static
         */
        public static function getEtag()
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getEtag();
        }

        /**
         * Fetches a new Image with current instance configuration.
         *
         * @param string $publicId The public ID of the image.
         * @static
         */
        public static function getImage($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getImage($publicId);
        }

        /**
         * Fetches a new Video with current instance configuration.
         *
         * @param string|mixed $publicId The public ID of the video.
         * @static
         */
        public static function getVideo($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getVideo($publicId);
        }

        /**
         * Fetches a raw file with current instance configuration.
         *
         * @param string|mixed $publicId The public ID of the file.
         * @static
         */
        public static function getFile($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getFile($publicId);
        }

        /**
         *
         *
         * @static
         */
        public static function getImageTag($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getImageTag($publicId);
        }

        /**
         *
         *
         * @static
         */
        public static function getVideoTag($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getVideoTag($publicId);
        }

        /**
         * Adds a tag to the assets specified.
         *
         * @param string $tag The name of the tag to add.
         * @param array $publicIds The public IDs of the assets to add the tag to.
         * @param array $options The optional parameters. See the upload API documentation.
         * @see https://cloudinary.com/documentation/image_upload_api_reference#tags_method
         * @static
         */
        public static function addTag($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->addTag($tag, $publicIds, $options);
        }

        /**
         * Adds a tag to the assets specified.
         *
         * This is an asynchronous function.
         *
         * @static
         */
        public static function addTagAsync($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->addTagAsync($tag, $publicIds, $options);
        }

        /**
         * Removes a tag from the assets specified.
         *
         * @param string $tag The name of the tag to remove.
         * @param array|string $publicIds The public IDs of the assets to remove the tags from.
         * @param array $options The optional parameters. See the upload API documentation.
         * @see https://cloudinary.com/documentation/image_upload_api_reference#tags_method
         * @static
         */
        public static function removeTag($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeTag($tag, $publicIds, $options);
        }

        /**
         * Removes a tag from the assets specified.
         *
         * This is an asynchronous function.
         *
         * @static
         */
        public static function removeTagAsync($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeTagAsync($tag, $publicIds, $options);
        }

        /**
         * Removes all tags from the assets specified.
         *
         * @param array $publicIds The public IDs of the assets to remove all tags from.
         * @param array $options The optional parameters. See the upload API documentation.
         * @see https://cloudinary.com/documentation/image_upload_api_reference#tags_method
         * @static
         */
        public static function removeAllTags($publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeAllTags($publicIds, $options);
        }

        /**
         * Removes all tags from the assets specified.
         *
         * This is an asynchronous function.
         *
         * @static
         */
        public static function removeAllTagsAsync($publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeAllTagsAsync($publicIds, $options);
        }

        /**
         * Replaces all existing tags on the assets specified with the tag specified.
         *
         * @param string $tag The new tag with which to replace the existing tags.
         * @param array|string $publicIds The public IDs of the assets to replace the tags of.
         * @param array $options The optional parameters. See the upload API documentation.
         * @see https://cloudinary.com/documentation/image_upload_api_reference#tags_method
         * @static
         */
        public static function replaceTag($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->replaceTag($tag, $publicIds, $options);
        }

        /**
         * Replaces all existing tags on the assets specified with the tag specified.
         *
         * This is an asynchronous function.
         *
         * @static
         */
        public static function replaceTagAsync($tag, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->replaceTagAsync($tag, $publicIds, $options);
        }

        /**
         * Creates a sprite from all images that have been assigned a specified tag.
         *
         * The process produces two files:
         * * A single image file containing all the images with the specified tag (PNG by default).
         * * A CSS file that includes the style class names and the location of the individual images in the sprite.
         *
         * @param string $tag The tag that indicates which images to include in the sprite.
         * @param array $options The optional parameters. See the upload API documentation.
         * @see https://cloudinary.com/documentation/image_upload_api_reference#sprite_method
         * @static
         */
        public static function generateSprite($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateSprite($tag, $options);
        }

        /**
         * Creates a sprite from all images that have been assigned a specified tag.
         *
         * This is an asynchronous function.
         *
         * @static
         */
        public static function generateSpriteAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateSpriteAsync($tag, $options);
        }

        /**
         * Creates a PDF file from images in your media library that have been assigned a specific tag.
         *
         * Important note for free accounts:
         * By default, while you can use this method to generate PDF files, free Cloudinary accounts are blocked from delivering
         * files in PDF format for security reasons.
         * For details or to request that this limitation be removed for your free account, see Media delivery.
         *
         * @see https://cloudinary.com/documentation/paged_and_layered_media#creating_pdf_files_from_images
         * @static
         */
        public static function generatePDF($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generatePDF($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generatePDFAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generatePDFAsync($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedGIF($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedGIF($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedPNG($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedPNG($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedPNGAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedPNGAsync($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedWEBP($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedWEBP($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedWEBPAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedWEBPAsync($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedMP4($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedMP4($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedMP4Async($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedMP4Async($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedWEBM($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedWEBM($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateAnimatedWEBMAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateAnimatedWEBMAsync($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function multi($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->multi($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function multiAsync($tag, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->multiAsync($tag, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function explode($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->explode($publicId, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function explodeAsync($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->explodeAsync($publicId, $options);
        }

        /**
         * Dynamically generates an image from a given textual string.
         *
         * @param string $text The text string to generate an image for.
         * @param array $options The optional parameters.  See the upload API documentation.
         * @return \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine
         * @see https://cloudinary.com/documentation/image_upload_api_reference#text_method
         * @static
         */
        public static function generateImageFromText($text, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateImageFromText($text, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function generateImageFromTextAsync($text, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->generateImageFromTextAsync($text, $options);
        }

        /**
         *
         *
         * @param null $targetFormat
         * @static
         */
        public static function createArchive($options = [], $targetFormat = null)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->createArchive($options, $targetFormat);
        }

        /**
         *
         *
         * @param null $targetFormat
         * @static
         */
        public static function createArchiveAsync($options = [], $targetFormat = null)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->createArchiveAsync($options, $targetFormat);
        }

        /**
         *
         *
         * @static
         */
        public static function createZip($options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->createZip($options);
        }

        /**
         *
         *
         * @static
         */
        public static function createZipAsync($options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->createZipAsync($options);
        }

        /**
         *
         *
         * @static
         */
        public static function downloadZipUrl($options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->downloadZipUrl($options);
        }

        /**
         *
         *
         * @static
         */
        public static function downloadArchiveUrl($options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->downloadArchiveUrl($options);
        }

        /**
         *
         *
         * @static
         */
        public static function addContext($context, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->addContext($context, $publicIds, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function addContextAsync($context, $publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->addContextAsync($context, $publicIds, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function removeAllContext($publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeAllContext($publicIds, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function removeAllContextAsync($publicIds = [], $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->removeAllContextAsync($publicIds, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function destroy($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->destroy($publicId, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function destroyAsync($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->destroyAsync($publicId, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function rename($from, $to, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->rename($from, $to, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function renameAsync($from, $to, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->renameAsync($from, $to, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function explicit($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->explicit($publicId, $options);
        }

        /**
         *
         *
         * @static
         */
        public static function explicitAsync($publicId, $options = [])
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->explicitAsync($publicId, $options);
        }

        /**
         * Get Resource data
         *
         * @return \Cloudinary\Api\ApiResponse|\CloudinaryLabs\CloudinaryLaravel\string;
         * @static
         */
        public static function getResource($path)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getResource($path);
        }

        /**
         * Get the url of a file
         *
         * @return string|false
         * @static
         */
        public static function getUrl($publicId)
        {
            /** @var \CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine $instance */
            return $instance->getUrl($publicId);
        }

            }
    }

namespace L5Swagger {
    /**
     *
     *
     */
    class L5SwaggerFacade {
        /**
         *
         *
         * @throws L5SwaggerException
         * @static
         */
        public static function generateDocs()
        {
            /** @var \L5Swagger\Generator $instance */
            return $instance->generateDocs();
        }

            }
    }

namespace Datlechin\GoogleTranslate\Facades {
    /**
     *
     *
     * @see \Datlechin\GoogleTranslate\GoogleTranslate
     */
    class GoogleTranslate {
        /**
         *
         *
         * @static
         */
        public static function source($source)
        {
            /** @var \Datlechin\GoogleTranslate\GoogleTranslate $instance */
            return $instance->source($source);
        }

        /**
         *
         *
         * @static
         */
        public static function target($target)
        {
            /** @var \Datlechin\GoogleTranslate\GoogleTranslate $instance */
            return $instance->target($target);
        }

        /**
         *
         *
         * @deprecated
         * @static
         */
        public static function withSource($source)
        {
            /** @var \Datlechin\GoogleTranslate\GoogleTranslate $instance */
            return $instance->withSource($source);
        }

        /**
         *
         *
         * @deprecated
         * @static
         */
        public static function withTarget($target)
        {
            /** @var \Datlechin\GoogleTranslate\GoogleTranslate $instance */
            return $instance->withTarget($target);
        }

        /**
         *
         *
         * @static
         */
        public static function translate($text, $source = null, $target = null)
        {
            /** @var \Datlechin\GoogleTranslate\GoogleTranslate $instance */
            return $instance->translate($text, $source, $target);
        }

            }
    }

namespace Pnlinh\InfobipSms\Facades {
    /**
     *
     *
     */
    class InfobipSms {
        /**
         * Do send sms.
         *
         * @see https://www.infobip.com/en/blog/step-by-step-sms-api-php-tutorial-create-your-new-web-app
         * @param $to
         * @param $text
         * @return array
         * @static
         */
        public static function send($to, $text)
        {
            /** @var \Pnlinh\InfobipSms\InfobipSmsService $instance */
            return $instance->send($to, $text);
        }

            }
    }

namespace Illuminate\Support {
    /**
     *
     *
     * @template TKey of array-key
     * @template-covariant TValue
     * @implements \ArrayAccess<TKey, TValue>
     * @implements \Illuminate\Support\Enumerable<TKey, TValue>
     */
    class Collection {
        /**
         *
         *
         * @see \Barryvdh\Debugbar\ServiceProvider::register()
         * @static
         */
        public static function debug()
        {
            return \Illuminate\Support\Collection::debug();
        }

        /**
         *
         *
         * @see \App\Providers\BuilderMacrosServiceProvider::boot()
         * @param string|int $id
         * @return \Illuminate\Database\Eloquent\Model|static|null
         * @static
         */
        public static function firstWhereId($id)
        {
            return \Illuminate\Support\Collection::firstWhereId($id);
        }

        /**
         *
         *
         * @see \App\Providers\BuilderMacrosServiceProvider::boot()
         * @param \Illuminate\Support\Collection|array $ids
         * @return \Illuminate\Support\Collection
         * @static
         */
        public static function whereIdIn($ids)
        {
            return \Illuminate\Support\Collection::whereIdIn($ids);
        }

        /**
         *
         *
         * @see \App\Providers\BuilderMacrosServiceProvider::boot()
         * @param string $relation
         * @return \Illuminate\Support\Collection
         * @static
         */
        public static function selectMany($relation)
        {
            return \Illuminate\Support\Collection::selectMany($relation);
        }

            }
    }

namespace Illuminate\Http {
    /**
     *
     *
     */
    class Request {
        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param array $rules
         * @param mixed $params
         * @static
         */
        public static function validate($rules, ...$params)
        {
            return \Illuminate\Http\Request::validate($rules, ...$params);
        }

        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param string $errorBag
         * @param array $rules
         * @param mixed $params
         * @static
         */
        public static function validateWithBag($errorBag, $rules, ...$params)
        {
            return \Illuminate\Http\Request::validateWithBag($errorBag, $rules, ...$params);
        }

        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $absolute
         * @static
         */
        public static function hasValidSignature($absolute = true)
        {
            return \Illuminate\Http\Request::hasValidSignature($absolute);
        }

        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @static
         */
        public static function hasValidRelativeSignature()
        {
            return \Illuminate\Http\Request::hasValidRelativeSignature();
        }

        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $ignoreQuery
         * @param mixed $absolute
         * @static
         */
        public static function hasValidSignatureWhileIgnoring($ignoreQuery = [], $absolute = true)
        {
            return \Illuminate\Http\Request::hasValidSignatureWhileIgnoring($ignoreQuery, $absolute);
        }

        /**
         *
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $ignoreQuery
         * @static
         */
        public static function hasValidRelativeSignatureWhileIgnoring($ignoreQuery = [])
        {
            return \Illuminate\Http\Request::hasValidRelativeSignatureWhileIgnoring($ignoreQuery);
        }

        /**
         *
         *
         * @see \Spatie\Enum\Laravel\Http\EnumRequest::transformEnums()
         * @param array $transformations
         * @return void
         * @static
         */
        public static function transformEnums($transformations)
        {
            \Illuminate\Http\Request::transformEnums($transformations);
        }

            }
    /**
     *
     *
     */
    class UploadedFile {
        /**
         *
         *
         * @see \CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider::bootMacros()
         * @param mixed $folder
         * @static
         */
        public static function storeOnCloudinary($folder = null)
        {
            return \Illuminate\Http\UploadedFile::storeOnCloudinary($folder);
        }

        /**
         *
         *
         * @see \CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider::bootMacros()
         * @param mixed $folder
         * @param mixed $publicId
         * @static
         */
        public static function storeOnCloudinaryAs($folder = null, $publicId = null)
        {
            return \Illuminate\Http\UploadedFile::storeOnCloudinaryAs($folder, $publicId);
        }

            }
    }

namespace Illuminate\Database\Query {
    /**
     *
     *
     */
    class Builder {
        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\QueryBuilderExtraMethods::getGroupBy()
         * @static
         */
        public static function getGroupBy()
        {
            return \Illuminate\Database\Query\Builder::getGroupBy();
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\QueryBuilderExtraMethods::getSelect()
         * @static
         */
        public static function getSelect()
        {
            return \Illuminate\Database\Query\Builder::getSelect();
        }

            }
    }

namespace Illuminate\Database\Eloquent\Relations {
    /**
     *
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     * @template TDeclaringModel of \Illuminate\Database\Eloquent\Model
     * @template TResult
     * @mixin \Illuminate\Database\Eloquent\Builder<TRelatedModel>
     */
    class Relation {
        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoins()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @param string|null $morphable
         * @param bool $hasCheck
         * @static
         */
        public static function performJoinForEloquentPowerJoins($builder, $joinType = 'leftJoin', $callback = null, $alias = null, $disableExtraConditions = false, $morphable = null, $hasCheck = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoins($builder, $joinType, $callback, $alias, $disableExtraConditions, $morphable, $hasCheck);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForBelongsTo()
         * @param mixed $query
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForBelongsTo($query, $joinType, $callback = null, $alias = null, $disableExtraConditions = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForBelongsTo($query, $joinType, $callback, $alias, $disableExtraConditions);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForBelongsToMany()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForBelongsToMany($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForBelongsToMany($builder, $joinType, $callback, $alias, $disableExtraConditions);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForMorphToMany()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForMorphToMany($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForMorphToMany($builder, $joinType, $callback, $alias, $disableExtraConditions);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForMorph()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForMorph($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForMorph($builder, $joinType, $callback, $alias, $disableExtraConditions);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForMorphTo()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @param string|null $morphable
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForMorphTo($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false, $morphable = null)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForMorphTo($builder, $joinType, $callback, $alias, $disableExtraConditions, $morphable);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForHasMany()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @param bool $hasCheck
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForHasMany($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false, $hasCheck = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForHasMany($builder, $joinType, $callback, $alias, $disableExtraConditions, $hasCheck);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performJoinForEloquentPowerJoinsForHasManyThrough()
         * @param mixed $builder
         * @param mixed $joinType
         * @param mixed $callback
         * @param mixed $alias
         * @param bool $disableExtraConditions
         * @static
         */
        public static function performJoinForEloquentPowerJoinsForHasManyThrough($builder, $joinType, $callback = null, $alias = null, $disableExtraConditions = false)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performJoinForEloquentPowerJoinsForHasManyThrough($builder, $joinType, $callback, $alias, $disableExtraConditions);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::performHavingForEloquentPowerJoins()
         * @param mixed $builder
         * @param mixed $operator
         * @param mixed $count
         * @param string|null $morphable
         * @static
         */
        public static function performHavingForEloquentPowerJoins($builder, $operator, $count, $morphable = null)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::performHavingForEloquentPowerJoins($builder, $operator, $count, $morphable);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::usesSoftDeletes()
         * @param mixed $model
         * @static
         */
        public static function usesSoftDeletes($model)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::usesSoftDeletes($model);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::getThroughParent()
         * @static
         */
        public static function getThroughParent()
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::getThroughParent();
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::getFarParent()
         * @static
         */
        public static function getFarParent()
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::getFarParent();
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::applyExtraConditions()
         * @param \Kirschbaum\PowerJoins\PowerJoinClause $join
         * @static
         */
        public static function applyExtraConditions($join)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::applyExtraConditions($join);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::applyBasicCondition()
         * @param mixed $join
         * @param mixed $condition
         * @static
         */
        public static function applyBasicCondition($join, $condition)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::applyBasicCondition($join, $condition);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::applyNullCondition()
         * @param mixed $join
         * @param mixed $condition
         * @static
         */
        public static function applyNullCondition($join, $condition)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::applyNullCondition($join, $condition);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::applyNotNullCondition()
         * @param mixed $join
         * @param mixed $condition
         * @static
         */
        public static function applyNotNullCondition($join, $condition)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::applyNotNullCondition($join, $condition);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::applyNestedCondition()
         * @param mixed $join
         * @param mixed $condition
         * @static
         */
        public static function applyNestedCondition($join, $condition)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::applyNestedCondition($join, $condition);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::shouldNotApplyExtraCondition()
         * @param mixed $condition
         * @static
         */
        public static function shouldNotApplyExtraCondition($condition)
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::shouldNotApplyExtraCondition($condition);
        }

        /**
         *
         *
         * @see \Kirschbaum\PowerJoins\Mixins\RelationshipsExtraMethods::getPowerJoinExistenceCompareKey()
         * @static
         */
        public static function getPowerJoinExistenceCompareKey()
        {
            return \Illuminate\Database\Eloquent\Relations\Relation::getPowerJoinExistenceCompareKey();
        }

            }
    }

namespace Illuminate\Routing {
    /**
     *
     *
     * @mixin \Illuminate\Routing\RouteRegistrar
     */
    class Router {
        /**
         *
         *
         * @see \Spatie\Enum\Laravel\EnumServiceProvider::registerRouteBindingMacro()
         * @param string $key
         * @param string $class
         * @static
         */
        public static function enum($key, $class)
        {
            return \Illuminate\Routing\Router::enum($key, $class);
        }

            }
    /**
     *
     *
     */
    class Route {
        /**
         *
         *
         * @see \Spatie\Permission\PermissionServiceProvider::registerMacroHelpers()
         * @param mixed $roles
         * @static
         */
        public static function role($roles = [])
        {
            return \Illuminate\Routing\Route::role($roles);
        }

        /**
         *
         *
         * @see \Spatie\Permission\PermissionServiceProvider::registerMacroHelpers()
         * @param mixed $permissions
         * @static
         */
        public static function permission($permissions = [])
        {
            return \Illuminate\Routing\Route::permission($permissions);
        }

            }
    }


namespace  {
    class Debugbar extends \Barryvdh\Debugbar\Facades\Debugbar {}
    class Cloudinary extends \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary {}
    class L5Swagger extends \L5Swagger\L5SwaggerFacade {}
    class GoogleTranslate extends \Datlechin\GoogleTranslate\Facades\GoogleTranslate {}
    class InfobipSms extends \Pnlinh\InfobipSms\Facades\InfobipSms {}
}





