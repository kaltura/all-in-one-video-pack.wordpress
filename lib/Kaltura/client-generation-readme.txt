The client library should be generated using the Kaltura client generation framework (part of kaltura server https://github.com/kaltura/server)
The following configuration section was used to generate the lite client library:

[wordpress: all]
generator = PhpZendClientGenerator
include = session.start, partner.getSecrets, partner.register, baseEntry.get, baseEntry.list, baseEntry.update, media.update, baseEntry.delete, category.list, system.ping, uiConf.list, uiConf.get, metadata_metadata.add, metadata_metadata.update, metadata_metadata.list, metadata_metadataProfile.list, metadata_metadataProfile.listFields
ignore = KalturaFilter, KalturaUiConf, KalturaUiConfAdminBaseFilter, KalturaUiConfAdminFilter, KalturaResource, KalturaDataCenterContentResource, KalturaSearchItem
additional = KalturaFilter, KalturaUiConf, KalturaSearchItem
generateDocs = true
package = Kaltura
subpackage = Client

When generating a new library, and some unrelated inherited objects are added, each of those objects should be added to the ignore list.